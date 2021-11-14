<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
	<div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media();?>/images/avatar.png" alt="User Image">
        <div>
			<p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombres']; ?></p>
			<p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombrerol']; ?></p>
		</div>
	</div>
	<ul class="app-menu">
        <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
			<li>
				<a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
					<i class="app-menu__icon fas fa-home"></i>
					<span class="app-menu__label">Inicio</span>
				</a>
			</li>
		<?php } ?>

        <?php if(!empty($_SESSION['permisos'][2]['r'])){ ?>
			<li class="treeview">
				<a class="app-menu__item" href="#" data-toggle="treeview">
					<i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
					<span class="app-menu__label">Usuarios</span>
					<i class="treeview-indicator fa fa-angle-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fas fa-user-tie"></i> Usuarios</a></li>
					<li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fas fa-key"></i> Roles</a></li>
				</ul>
			</li>
		<?php } ?>

        <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
			<li>
				<a class="app-menu__item" href="<?= base_url(); ?>/estudiantes">
					<i class="app-menu__icon fa fa-user" aria-hidden="true"></i>
					<span class="app-menu__label">Estudiantes</span>
				</a>
			</li>
		<?php } ?>

		<?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
			<li class="treeview">
				<a class="app-menu__item" href="#" data-toggle="treeview">
					<i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
					<span class="app-menu__label">Maestros</span>
					<i class="treeview-indicator fa fa-angle-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a class="treeview-item" href="<?= base_url(); ?>/maestro"><i class="icon fas fa-user-tie"></i> Registrar Maestro</a></li>
					<li><a class="treeview-item" href="<?= base_url(); ?>/genqrr"><i class="icon fas fa-qrcode"></i> Generador de QR</a></li>
					<li><a class="treeview-item" href="<?= base_url(); ?>/asistencia"><i class="icon fas fa-clipboard-list"></i> Asistencias</a></li>
				</ul>
			</li>
		<?php } ?>

		<?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
			<li>
				<a class="app-menu__item" href="<?= base_url(); ?>/api">
					<i class="app-menu__icon far fa-comment" aria-hidden="true"></i>
					<span class="app-menu__label">SMS</span>
				</a>
			</li>
		<?php } ?>

	</ul>
</aside>
