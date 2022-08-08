<?php
    class navx extends Plugin {

        public function init(){
            $this->dbFields = array(
        'ulinside'=> '', 
        'navclass'=> '', 
        'classli'=> '', 
        'classul'=> '', 
        'classliparent'=> '',
        'classulli'=> '', 
        'showhome'=> '', 
        'homename'=> '', 
'classlia'=>'',
        'classliulia'=>'',
        'classliaparent'=>'',

        'bootstrapornot'=>'',
            );}

 


            public function form(){

                $html = '   


                <div class="bg-danger text-light p-3">
                
                <h3>How use this?</h3>

               <p class="lead" > Put this function inside your template file where you want use it.</p>

              
               <div class="bg-light text-dark col-md-12 border p-2 mt-2">
               &#60;?php getNavx() ;?&#62;
               </div>
                </div>



                <h5 class="mt-5">Bootrap menu or default?</h5>

                <div class="bg-light border p-3 mb-2">

 
                 <select name="bootstrapornot">
                <option value="bootstrap" '.($this->getValue('bootstrapornot')==="bootstrap"?"selected":"").'>bootstrap</option>
                <option value="default" '.($this->getValue('bootstrapornot')==="default"?"selected":"").'>default</option>
                
                </select>
             
                </div>



                <h5 class="mt-5">Navigation <b>ul</b> included in function?</h5>

                <div class="bg-light border p-3 mb-2">

                
                <p>add <b>ul inside</b> function</p>
                <select name="ulinside">
                <option value="yes" '.($this->getValue('ulinside')==="yes"?"selected":"").'>yes</option>
                <option value="no" '.($this->getValue('ulinside')==="no"?"selected":"").'>no</option>
                
                </select>
                <br>
                
                
                
                <p>class <b>navigation ul</b></p>
                <input type="text" placeholder="put navigation class"  value="'.$this->getValue('navclass').'" name="navclass">
                <br> 

                </div>
       


                <h5 class="mt-3">Show <b>homepage link</b> on menu?</h5>

                
  <div class="bg-light border p-3 mb-2">
  <p>Show <b>homepage</b></p>
  <select name="showhome">
  <option value="yes" '.($this->getValue('showhome')==="yes"?"selected":"").'>yes</option>
  <option value="no" '.($this->getValue('showhome')==="no"?"selected":"").'>no</option>
  
  </select>
  <br>
  
  
  <p>Homepage <b>link name</b></p>
  <input type="text" placeholder="put name home on menu if you use it show" value='.$this->getValue('homename').' name="homename">
  <br>   
  </div>
     



  <h5 class="mt-4"><b>li & link</b> class settings</h5>

  <div class="border bg-light p-3 mb-2">

 
  
  <p>class <b>li > link</b> on navigation</p>
  <input type="text" placeholder="put class navigation for li example (oneclass twoclass)" name="classlia"  value="'.$this->getValue('classlia').'">
  <br>

  <p>class <b>li dropdown parent > link</b> on navigation</p>
  <input type="text" placeholder="put class navigation for li example (oneclass twoclass)" name="classliaparent"  value="'.$this->getValue('classliaparent').'">
  <br>

    
  <p>class <b>li > dropdown ul> li > link</b> on navigation</p>
  <input type="text" placeholder="put class navigation for li example (oneclass twoclass)" name="classliulia"  value="'.$this->getValue('classliulia').'">
  <br>


  <hr>

  <p>class <b>li</b> on navigation</p>
  <input type="text" placeholder="put class navigation for li example (oneclass twoclass)" name="classli"  value="'.$this->getValue('classli').'">
  <br>

  
<p>class <b>li dropdown parent</b> on navigation</p>
<input type="text" placeholder="put class navigation for li parent dropdown example (oneclass twoclass)" name="classliparent"  value="'.$this->getValue('classliparent').'">
<br>


<p>class <b>dropdown ul</b> on navigation</p>
<input type="text" placeholder="put class navigation for ul (submenu) example (oneclass twoclass)" name="classul"  value="'.$this->getValue('classul').'">
<br>
<p>class <b>dropdown ul > li</b> on navigation</p>
<input type="text" placeholder="put class navigation for li (submenu) example (oneclass twoclass)" name="classulli" value="'.$this->getValue('classulli').'">

  
  </div>

   
  <div class="bg-danger text-light col-md-12 mt-5 py-3 d-block border text-center">

      
  <p class="lead">Created by <b>multicolor</b> | Buy me coffe ❤️  </p>

  <a href="https://www.paypal.com/donate/?hosted_button_id=TW6PXVCTM5A72">
  <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"  />
  </a>

  <hr>
 
<a class="small text-light" href="https://forum.bludit.org/viewtopic.php?t=2176">  
Plugin code based on this topic and fixes by Bernie
</a>
  </div>

';

                return $html;

            }


            public function siteBodyEnd(){

              if($this->getValue('bootstrapornot')==='bootstrap'){
                echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>';

              }

            }



    }





    function getNavx(){

        global $plugins;
        global $staticContent;

 


                if($plugins['all']['navx']->installed()){

                  if($plugins['all']['navx']->getValue('bootstrapornot')==='bootstrap'){


                    if($plugins['all']['navx']->getValue('ulinside')==='yes'){

                        echo ' <ul class=" navbar-nav '.$plugins['all']['navx']->getValue('navclass').'">';
                      }

                    if($plugins['all']['navx']->getValue('showhome')==='yes'){

                  echo ' <li class="nav-item '.$plugins['all']['navx']->getValue('classli').'"><a  class=" nav-link '.$plugins['all']['navx']->getValue('classlia').'" href="'.Theme::siteUrl().'">'.$plugins['all']['navx']->getValue('homename').'</a></li>';
                }


               foreach ($staticContent as $staticPage){

            
                  if (!$staticPage->hasChildren() and !$staticPage->isChild()) { 

                    
                  echo '<li class=" nav-item '.$staticPage->slug().' '.$plugins['all']['navx']->getValue('classli').'  '.$plugins['all']['navx']->getValue('classli').'"><a href="'.$staticPage->permalink().'" class=" nav-link'.$staticPage->slug().' '.$plugins['all']['navx']->getValue(' classlia').'">'.$staticPage->title().'</a></li>';        

                  };


                  if ($staticPage->hasChildren()) {
                   echo ' <li  class="nav-item dropdown '.$staticPage->slug().' '.$plugins['all']['navx']->getValue('classliparent').'"><a id="'.$staticPage->slug().'" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle '.!$staticPage->slug().' '.$plugins['all']['navx']->getValue('classliaparent').'">'.$staticPage->title().'</a><ul class="dropdown-menu dropdown-menu-end '.$plugins['all']['navx']->getValue('classul').'" aria-labelledby="'.$staticPage->slug().'">';
                      $children = $staticPage->children();
                        
                        foreach ($children as $child) { 
                        echo '<li class="'.$plugins['all']['navx']->getValue('classulli').'"><a href="'.$child->permalink().'" class="dropdown-item '.$staticPage->slug().' '.$plugins['all']['navx']->getValue('classliulia').'">'.$child->title().'</a></li>';
                       }
                    echo '</ul></li>';
                
                     };

                };



                
                if($plugins['all']['navx']->getValue('ulinside')==='yes'){

                    echo ' </ul>';
                  }


            }elseif($plugins['all']['navx']->getValue('bootstrapornot')==='default'){



      
                      if($plugins['all']['navx']->installed()){
      
      
                          if($plugins['all']['navx']->getValue('ulinside')==='yes'){
      
                              echo ' <ul class="'.$plugins['all']['navx']->getValue('navclass').'">';
                            }
      
                          if($plugins['all']['navx']->getValue('showhome')==='yes'){
      
                        echo ' <li class="'.$plugins['all']['navx']->getValue('classli').'"><a  class="'.$plugins['all']['navx']->getValue('classlia').'" href="'.Theme::siteUrl().'">'.$plugins['all']['navx']->getValue('homename').'</a></li>';
                      }
      
      
                     foreach ($staticContent as $staticPage){
      
                  
                        if (!$staticPage->hasChildren() and !$staticPage->isChild()) { 
      
                          
                        echo '<li class="'.$staticPage->slug().' '.$plugins['all']['navx']->getValue('classli').'  '.$plugins['all']['navx']->getValue('classli').'"><a href="'.$staticPage->permalink().'" class="'.$staticPage->slug().' '.$plugins['all']['navx']->getValue(' classlia').'">'.$staticPage->title().'</a></li>';        
      
                        };
      
      
                        if ($staticPage->hasChildren()) {
                         echo ' <li  class="'.$staticPage->slug().' '.$plugins['all']['navx']->getValue('classliparent').'"><a  href="'.$staticPage->permalink().'"  class="'.$staticPage->slug().' '.$plugins['all']['navx']->getValue('classliaparent').'">'.$staticPage->title().'</a><ul class="'.$plugins['all']['navx']->getValue('classul').'">';
                            $children = $staticPage->children();
                              
                              foreach ($children as $child) { 
                              echo '<li class="'.$plugins['all']['navx']->getValue('classulli').'"><a href="'.$child->permalink().'" class="'.$staticPage->slug().' '.$plugins['all']['navx']->getValue('classliulia').'">'.$child->title().'</a></li>';
                             }
                          echo '</ul></li>';
                      
                           };
      
                      };
      
      
      
                      
                      if($plugins['all']['navx']->getValue('ulinside')==='yes'){
      
                          echo ' </ul>';
                        }
      
      
                  };






            };


        };
      };
        







 


?>