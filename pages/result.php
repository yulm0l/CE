 <?php 
    $examId = $_GET['id'];
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<div class="app-main__outer">
<div class="app-main__inner">
    <div id="refreshData">
            
    <div class="col-md-12">
        <div class="app-page-title2">
            <div class="page-title-wrapper"> 
                <div class="page-title-heading">
                    <div>
                        <?php echo $selExam['ex_title']; ?>
                          <div class="page-title-subheading">
                            <?php echo $selExam['ex_description']; ?>
                          </div>
                          
                          <div class="widget-content-right">
    <div class="widget-numbers text-white">
        Calificación:
        <?php
        $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
        
        $score = $selScore->rowCount(); // Obtener el puntaje
        
        $over = $selExam['ex_questlimit_display']; // Valor máximo
        
        // Verificar si la puntuación es menor a 6 y aplicar un estilo CSS en consecuencia
        if ($score < 6) {
            echo '<span style="color: red;">' . $score . '</span>';
        } else {
            echo '<span>' . $score . '</span>';
        }
        ?>
        / <?php echo $over; ?>
    </div>
</div>



                    <div class="widget-numbers text-white"> Porcentaje: 
                            <?php 
                                $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                            ?>
                            <span>
                                <?php 
                                    $score = $selScore->rowCount();
                                    $ans = $score / $over * 100;
                                    echo number_format($ans);
                                    echo "%";
                                    
                                 ?>
                            </span> 
                        </div>
                    </div>



                    
                </div>
            </div>
        </div>  
        <div class="row col-md-12">
        	<h1 class="text-primary">Resultados</h1>
        </div>

        <div >
        	<div class="main-card mb-3 card">
                <div class="card-body">
                	<h5 class="card-title">Tus respuestas buenas aparceran en color verde</h5>
        			<table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                    <?php 
                    	$selQuest = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id WHERE eqt.exam_id='$examId' AND ea.axmne_id='$exmneId' AND ea.exans_status='new' ");
                    	$i = 1;
                    	while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                    		<tr>
                    			<td>
                    				<b><p><?php echo $i++; ?> .) <?php echo $selQuestRow['exam_question']; ?></p></b>
                    				<label class="pl-4 text-success">
                    					Tu respuesta : 
                    					<?php 
                    						if($selQuestRow['exam_answer'] != $selQuestRow['exans_answer'])
                    						{ ?>
                    							<span style="color:red"><?php echo $selQuestRow['exans_answer']; ?></span>
                    						<?PHP }
                    						else
                    						{ ?>
                    							<span class="text-success"><?php echo $selQuestRow['exans_answer']; ?></span>
                    						<?php }
                    					 ?>
                    				</label>
                    			</td>
                    		</tr>
                    	<?php }
                     ?>
	                 </table>
                </div>
            </div>
        </div>


    </div>


    </div>
</div>
<style>
.app-page-title2 {
    background-color: #009efd; /* Cambia el color de fondo a tu elección */
    color: #fff; /* Cambia el color del texto a tu elección */
    font-size: 24px; /* Cambia el tamaño de fuente a tu elección */
    font-weight: bold; /* Puedes ajustar el peso de la fuente según tus preferencias */
    padding: 10px 20px; /* Añade espaciado alrededor del texto según tus preferencias */
    border-radius: 5px; /* Agrega bordes redondeados si lo deseas */
}
</style>