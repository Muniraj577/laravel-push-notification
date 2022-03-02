<template>
    <li class="nav-item dropdown">
        <a href="" id="navbarDropdown" class="nav-link dropdown-toggle" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-globe"></i> Notification <span class="badge badge-danger"
                                                           id="count-notification">
                                    {{ lessons.length }}
                                </span><span
            class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a href="#" class="dropdown-item" v-for="lesson in lessons">
                {{ lesson.data['lesson']['title'] }} {{ new Date(lesson.created_at).toISOString().split('T')[0]}}
            </a>
            <div class="dropdown-divider" role="separator"></div>
            <a href="" class="dropdown-item" v-if="lessons.length==0">
                No Notificatioon
            </a>
        </div>
    </li>
</template>

<script>
export default {
    props: ['lessons'],
};
</script>
