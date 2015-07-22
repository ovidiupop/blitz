<?php
namespace frontend\components\widgets;

use yii\helpers\Html;
use Yii;
use yii\base\Component;

class carousel extends Component {

    public $settings;
    protected $active=true;

    public function init(){
        parent::init();
        
        if(!isset($this->settings)){
            $this->settings = [
                    [
                        'src'=>"../themes/margo/assets/images/slider/bg1.jpg",
                        'alt'=>'img1',
                        'messages'=>[
                            [
                                'h'=>'h2',
                                'text'=>'<span>Bun venit la <strong>Expert Company</strong></span>',
                                'class'=>'animated2'
                            ],
                            [
                                'h'=>'h3',
                                'text'=>'<span>Ultima cucerire a tehnicii</span>',
                                'class'=>'animated3'
                            ]
                        ],
                        'buttons'=>[
                            [
                                'tag'=>'p',
                                'tag-class'=>'animated4',
                                'url'=>'#',
                                'a-class'=>'slider btn btn-system btn-large',
                                'text'=>'Verifica',
                            ]
                        ],
                    ],
                    [
                        'src'=>"../themes/margo/assets/images/slider/bg2.jpg",
                        'alt'=>'img2',
                        'messages'=>[
                            [   'h'=>'h2',
                                'text'=>'<span><strong>Expert Company</strong> pentru cei puternici</span>',
                                'class'=>'animated4'
                            ],
                            ['h'=>'h3',
                                'text'=>'<span>Cheia succesului!</span>',
                                'class'=>'animated5'
                            ]
                        ],                        
                        'buttons'=>[
                            [
                                'tag'=>'p',
                                'tag-class'=>'animated6',
                                'url'=>'#',
                                'a-class'=>'slider btn btn-system btn-large',
                                'text'=>'Cumpara acum',
                            ]
                        ],
                    ],
                    [
                        'src'=>"../themes/margo/assets/images/slider/bg3.jpg",
                        'alt'=>'img2',
                        'messages'=>[
                            [
                                'h'=>'h2',
                                'text'=>'<span>Calea ta spre <strong>succes</strong></span>',
                                'class'=>'animated7 white'
                            ],
                            [
                                'h'=>'h3',
                                'text'=>'<span>De ce mai astepti?</span>',
                                'class'=>'animated8 white'
                            ]
                        ],                        
                        'buttons'=>[
                            [
                                'tag'=>'div',
                                'tag-class'=>'',
                                'url'=>'#',
                                'a-class'=>'animated4 slider btn btn-system btn-large btn-min-block',
                                'text'=>'Achizitioneaza',
                            ],
                            [
                                'tag'=>false,
                                'tag-class'=>'',
                                'url'=>'#',
                                'a-class'=>'animated4 slider btn btn-default btn-min-block',
                                'text'=>'Vezi alte experiente',
                            ]                            
                        ],
                    ]
                ];
        }

    }
    
    public function getCarousel() {
?>
            <section id="home">
            <!-- Carousel -->
            <div id="main-slide" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                    <li data-target="#main-slide" data-slide-to="1"></li>
                    <li data-target="#main-slide" data-slide-to="2"></li>
                </ol>
                <!--/ Indicators end-->

                <!-- Carousel inner -->
                <div class="carousel-inner">

                    <?php
                        foreach ($this->settings as $slide){
//                            Yii::$app->h->dump($slide['messages']);
                        //item
                        echo Html::beginTag('div', ['class'=>$this->active ? "item active":"item"]);
                        
                            echo Html::img($slide['src'], ['class'=>"img-responsive", 'alt'=>$slide['alt']]);

                            if(isset($slide['messages'])) {

                                //slider-content
                                echo Html::beginTag('div', ['class'=>"slider-content"]);
                                // col-md-12 text-center
                                echo Html::beginTag('div', ['class'=>"col-md-12 text-center"]);
                                
                                    foreach ($slide['messages'] as $message){
                                        
                                        echo Html::tag($message['h'], $message['text'], ['class'=>$message['class']]);
                                    }

                                    if(isset($slide['buttons'])){
                                        foreach($slide['buttons'] as $button){
                                            if($button['tag']){
                                                echo Html::beginTag($button['tag'], ['class'=>$button['tag-class']]);
                                            }
                                            echo Html::a($button['text'], $button['url'], ['class'=>$button['a-class']]);
                                            if($button['tag']){
                                                echo Html::endTag($button['tag']);
                                            }
                                        }
                                    }
                                //end col-md-12 text-center
                                echo Html::endTag('div');
                                    
                                //end slider-content
                                echo Html::endTag('div');
                            }
                            
                        //end item
                        echo Html::endTag('div');
                        $this->active = false;

                        }
                    ?>
                </div>

                <br>
                <!-- Controls -->
                <a class="left carousel-control" href="#main-slide" data-slide="prev">
                    <span><i class="fa fa-angle-left"></i></span>
                </a>
                <a class="right carousel-control" href="#main-slide" data-slide="next">
                    <span><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
            <!-- /carousel -->
        </section>
        <!-- End Home Page Slider -->
<?php
    }    
}    


