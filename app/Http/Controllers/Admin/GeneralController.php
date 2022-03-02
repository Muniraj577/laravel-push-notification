<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralRequest;
use App\Models\GeneralInformation;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use App\Models\FileUpload as Upload;
use Illuminate\Support\Facades\Session;

class GeneralController extends Controller
{
    protected $destination = 'images/general/';

    public function index()
    {
        $generalsettings = GeneralInformation::all()->take(1);
        return view('admin.generalsetting.index', compact('generalsettings'));
    }

    public function store(GeneralRequest $request)
    {
        $input = $request->except('_token');
        if ($request->hasFile('company_logo')) {
            $input['company_logo'] = Upload::file($request, 'company_logo', '', $this->destination);
        }
        $general = GeneralInformation::create($input);
        $dataName = $general->company_name;
        $tableName = getTableName(new GeneralInformation());
        $msg = 'added the general information ' . $dataName;
        UserActivity::storeLog($request, 'create', $message = $msg, $table_name = $tableName,
            $data_name = $dataName);
        Session::flash('message', 'Company Information added successfully.');
        return redirect()->route('general.index');
    }

    public function update(Request $request, $id)
    {
        $input = $request->except('_token');
        $general = GeneralInformation::find($id);
        $oldlogo = $general->company_logo;
        if ($request->hasFile('company_logo')) {
            if ($oldlogo != null && file_exists($this->destination . $oldlogo)) {
                unlink($this->destination . $oldlogo);
            }
            $input['company_logo'] = Upload::file($request, 'company_logo', '', $this->destination);
        } else {
            $input['company_logo'] = $oldlogo;
        }
        $general = $general->update($input);
        $notification = array(
            'alert-type' => 'success',
            'msg' => 'General Information updated',
        );
        return response()->json(['datas'=>$input,'noti'=>$notification]);
    }

    public function destroy(Request $request, $id)
    {
        $general = GeneralInformation::find($id);
        $dataName = $general->company_name;
        $file = $general->company_logo;
        if ($file != null && file_exists($this->destination . $file)) {
            unlink($this->destination . $file);
        }
        $tableName = getTableName(new GeneralInformation());
        $msg = 'deleted the company information for ' . $dataName;
        UserActivity::storeLog($request, 'delete', $message = $msg, $table_name = $tableName,
            $data_name = $dataName);
        $general->truncate();
        Session::flash('message', 'Company Information deleted');
        return redirect()->route('general.index');
    }
}
