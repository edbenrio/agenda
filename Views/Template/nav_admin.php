<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?=media();?>/images/uploads/avatar.png"
            alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?= $_SESSION["usuario"] ?></p>
            <p class="app-sidebar__user-designation"><?= $_SESSION["rol"] ?></p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>dashboard">
            <i class="app-menu__icon fa fa-calendar" aria-hidden="true"></i><span class="app-menu__label">Agenda</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>paciente">
            <i class="app-menu__icon fa fa-wheelchair" aria-hidden="true"></i><span class="app-menu__label">Pacientes</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>consulta">
                <i class="app-menu__icon fa fa-pencil-square-o" aria-hidden="true"></i><span class="app-menu__label">Consultas</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>sanatorio">
                <i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Sanatorios</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>asistente">
                <i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Asistentes</span>
            </a>
        </li>
    </ul>
</aside>