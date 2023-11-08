   <div class="app-sidebar sidebar-shadow">
                    <div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading"><a href="home.php">Dashboards</a></li>

                                <li class="app-sidebar__heading">Gestionar nivel</li>
                                <li>
                                    <a href="#">
                                         <i class="metismenu-icon pe-7s-display2"></i>
                                         Grado escolar
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#modalForAddCourse">
                                                <i class="metismenu-icon"></i>
                                                Agregar Nivel
                                            </a>
                                        </li>
                                        <li>
                                            <a href="home.php?page=manage-course">
                                                <i class="metismenu-icon">
                                                </i>Gestionar
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                               
                                <li class="app-sidebar__heading">Administrar  quiz/examen</li>
                                <li>
                                    <a href="#">
                                         <i class="metismenu-icon pe-7s-display2"></i>
                                         Quiz
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#modalForExam">
                                                <i class="metismenu-icon"></i>
                                                Agregar+
                                            </a>
                                        </li>
                                        <li>
                                            <a href="home.php?page=manage-exam">
                                                <i class="metismenu-icon">
                                                </i>Administrar
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                           
                         
                                <li class="app-sidebar__heading">Administrar usuarios</li>
                                <li>
                                    <a href="" data-toggle="modal" data-target="#modalForAddExaminee">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>Nuevo usuario
                                    </a>
                                </li>
                                <li>
                                    <a href="home.php?page=manage-examinee">
                                        <i class="metismenu-icon pe-7s-users">
                                        </i>Administrar usuario
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">RANKING</li>
                                <li>
                                    <a href="home.php?page=ranking-exam">
                                        <i class="metismenu-icon pe-7s-cup">
                                        </i>Ranking por examen
                                    </a>
                                </li>


                                <li class="app-sidebar__heading">Reporte</li>
                                <li>
                                    <a href="home.php?page=examinee-result">
                                        <i class="metismenu-icon pe-7s-cup">
                                        </i>Resultado del usuario
                                    </a>
                                </li>
                              

                                 <li class="app-sidebar__heading">Comentarios y sugerencias</li>
                                <li>
                                    <a href="home.php?page=feedbacks">
                                        <i class="metismenu-icon pe-7s-chat">
                                        </i>Todos
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>  


<style>
.app-sidebars {
    background: #009ffd; 
    color: #232528; 
    width: 250px; 
}

.app-sidebar__heading {
    color: #232528; 
    font-weight: bold;
    padding: auto;
}

.vertical-nav-menu li {
    list-style: none;
    margin: auto;
    padding: auto;
}

.vertical-nav-menu a {
    color: #232528; 
    text-decoration: none;
    display: block;
    padding: auto;
    transition: background 0.3s;
}

.vertical-nav-menu a:hover {
    background: #232528; 
}

.metismenu-icon {
    margin-right: 5px;
    font-size: 5px;
}



.scrollbar-sidebar {
    max-height: 80vh; 
    overflow-y: auto;
}

.hamburger {
    background: transparent;
    border: none;
    margin-right: auto;
    cursor: pointer;
}

.hamburger:hover {
    background: transparent;
}

</style>