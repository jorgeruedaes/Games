<?php
include('../../menuinicial.php');
$id = $_GET['id'];
?>

<div class="ec-mini-header">
    <span class="ec-blue-transparent"></span>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ec-mini-title">
                    <h1></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ec-main-content">
            <!--// Main Section \\-->
            <div class="ec-main-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ec-spacer-section">
                         <?php 

                            $vector = ObtenerNoticia($id);

                            foreach ($vector as $value)
                            {
                            	
                           
                            ?>
                            <div class="ec-detail-editor">
                            <ul class="ec-blog-option">
												<li>
												<i class="fa fa-clock-o"></i> Fecha publicación: 
												<a href="javascript:void();" class="ec-colorhover">2017-04-12</a>
												<a href="javascript:void();" class="ec-color float-right font-15">Sub Baby</a>
												</li>
											</ul>
                                <h4 class="center font-20"><?php echo $value['titulo']?></h4>
                                <br>
                                <div class="row">
                                	<div class="col-md-6">
                                		  <figure class="ec-detail-thumb" ><img src="webs/images/Noticias/<?php echo $value['imagen']; ?>" alt=""></figure>
                                	</div>
                                	<div class="col-md-6">
                                <p class="justify" style=""><?php echo $value['texto']?></p>
                                	</div>
                                </div>
                              
                               
                            </div>
                            <?php } ?>
                            <!--// Related Post //-->
                     
                            <!--// Authore Post //-->
                       
                            <!--// Authore Post //-->
                            <!--// User Comment //-->
                     
                            <!--// User Comment //-->
                            <!--// Comment Form //-->
                         
                            <!--// Comment Form //-->
                        </div>
                        
                    </div>
                    <br>
                     <br>
                      <br>
                       <br>
                        <br>
                         <br>
                </div>
            </div>
            <!--// Main Section \\-->
        </div>
<?php
include('../../footerinicial.php');
?>