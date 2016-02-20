<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

<script type="text/javascript">
    jQuery(function($){
        $('.month').hide();
        $('.month:first').show();
        $('.months a: first').addClass('active');
        var current = 1;

        $('.months a').click(function(){
           var month = $(this).attr('id').replace('linkMonth', '');
            //alert(month);
            if(month != current){
                $('#month'+current).slideUp();
                $('#month'+month).slideDown();

                $('.months a').removeClass('active');
                $('.months a#linkMonth'+month).addClass('active');
                current = month;
            }
            return false;
        });
    });
</script>

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive img_home_princ" src="<?=$this->surl?>/images/default/logo.png" alt="Logo">

                <div class="intro-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita maxime officiis quisquam repellat velit. Facilis harum hic iste iure minima tenetur veniam, vero! Accusamus autem distinctio in repellat tempore voluptatem!
                </div>
            </div>
        </div>
    </div>
</header>



<!-- Calendar Asynchrone -->
<section id="calendar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Calendrier</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">

            <div class="col-sm-12 calendar-item">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae dolor est nulla odio quod repellat voluptas! Accusamus aut consequuntur, culpa deleniti inventore iusto magni molestias obcaecati perferendis qui recusandae velit.

                <?php
                require_once('Dates.php');
                $date = new Dates();
                $year = date('Y');
                $dates = $date->getAll($year);

                ?>

                <div class="periods">
                    <div class="year">
                        <?= $year; ?>
                    </div>

                    <div class="months">
                        <ul class="months_ul">
                            <?php foreach($date->months as $id=>$m): ?>
                                <li class="months_li"><a style="text-decoration: none;" class="months_lien" href="#" id="linkMonth<?=$id+1;?>"><?= utf8_encode(substr(utf8_decode($m), 0, 3)); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <?php $dates = current($dates); ?>
                    <?php foreach($dates as $m=>$days): ?>
                        <div class="month" id="month<?= $m; ?>">
                            <table style="font-size: 18px;" class="table table-responsive table-bordered ">
                                <thead>
                                    <tr>
                                        <?php foreach($date->days as $d): ?>
                                            <th>
                                                <?= substr($d, 0, 3); ?>
                                            </th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php $end = end($days); foreach($days as $d=>$w): ?>
                                            <?php if($d == 1 && $w != 1): ?>
                                                <td colspan="<?= $w - 1; ?>" class="padding"></td>
                                            <?php endif; ?>

                                            <td>
                                                <div class="relative">
                                                    <div class="day"><?= $d ?></div>
                                                </div>
                                            </td>
                                            <?php if($w == 7): ?>
                                    </tr>
                                    <tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if($end != 7): ?>
                                            <td colspan="<?= 7 - $end; ?>" class="padding"></td>
                                        <?php endif; ?>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>
    </div>
</section>





<div class="apropos">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>A propos</h2>
                <hr class="star-primary">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A obcaecati provident rerum ut voluptatum. Necessitatibus, nihil, quod? Animi autem commodi cumque deleniti inventore iste laboriosam odit perferendis rem vel. Molestiae?</p>
            </div>

            <div class="col-lg-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi architecto assumenda debitis facere libero odit rerum vero voluptatibus. Dignissimos enim laborum numquam reprehenderit? Assumenda fugit hic in mollitia quod!</p>
            </div>

            <div class="col-lg-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam ea iure nisi perspiciatis quisquam, quod sunt tempora. Ad adipisci dolorem error eum excepturi inventore laborum magni quisquam veniam voluptatem. Dicta.</p>
            </div>
        </div>
    </div>
</div>