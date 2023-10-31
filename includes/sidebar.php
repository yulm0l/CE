<div class="app-sidebar sidebar-shadow">
    <div >
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

         
                <li class="app-sidebar__heading">Quizzes disponibles</li>
                <li>
                <a href="#">
                     <i class="metismenu-icon pe-7s-display2"></i>
                    Quizzes
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul >
                    <?php 
                        
                        if($selExam->rowCount() > 0)
                        {
                            while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                 <li>
                                 <a href="#" id="startQuiz" data-id="<?php echo $selExamRow['ex_id']; ?>"  >
                                    <?php 
                                        $lenthOfTxt = strlen($selExamRow['ex_title']);
                                        if($lenthOfTxt >= 23)
                                        { ?>
                                            <?php echo substr($selExamRow['ex_title'], 0, 20);?>.....
                                        <?php }
                                        else
                                        {
                                            echo $selExamRow['ex_title'];
                                        }
                                     ?>
                                 </a>
                                 </li>
                            <?php }
                        }
                        else
                        { ?>
                            <a href="#">
                                <i class="metismenu-icon"></i>No Exam's @ the moment
                            </a>
                        <?php }
                     ?>


                </ul>
                </li>

                 <li class="app-sidebar__heading">Quizzes hechos</li>
                 <li>
    <?php 
    $selTakenExam = $conn->query("
        SELECT et.ex_id, et.ex_title
        FROM exam_tbl et
        INNER JOIN (
            SELECT exam_id, MAX(examat_id) AS max_examat_id
            FROM exam_attempt
            WHERE exmne_id = '$exmneId'
            GROUP BY exam_id
        ) latest_attempt ON et.ex_id = latest_attempt.exam_id
    ");

    if ($selTakenExam->rowCount() > 0) {
        while ($selTakenExamRow = $selTakenExam->fetch(PDO::FETCH_ASSOC)) {
            $examId = $selTakenExamRow['ex_id'];
            echo '<a href="home.php?page=result&id=' . $examId . '">' . $selTakenExamRow['ex_title'] . '</a>';
        }
    } else {
        echo '<a href="#" class="pl-3">Aún no has realizado cuestionarios</a>';
    }
    ?>
</li>



                <li class="app-sidebar__heading">Comentarios+</li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#feedbacksModal" >
                        Agrega tu comentario                     
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>  