<header class="head">
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-sm-11 col-lg-11">
                <img class="logo-page" src="/assets/img/resume_l.png" alt="Ukieweb">
                <h6 class="title" style="font-size: 28px">Список направлений</h6>
            </div>
            <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                <a href="/" class="btn-close hover-animate"></a>
            </div>
        </div>
    </div>
</header>

<section class="content padding-block border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12 padding-bottom">
                <?php if ($this->session->userdata('specialities')) : ?>
                <h3 class="title title-resume">Ниже приведен список направлений рекомендуемых для подачи документов</h3>
                <div class="block-grey">
                    <div id="education-slider" class="owl-carousel owl-theme">
                        <div class="item">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Наименование специальности</th>
                                    <th>Балл</th>
                                </tr>
                                </thead>
                                <?php foreach ($this->session->userdata('specialities') as $k => $speciality) : ?>
                                <tr class="<?= $k % 2 ? 'bg-grey' : 'bg-white'?>">
                                    <td class="font-weight-m"><?= $speciality['name']?></td>
                                    <td><?= $speciality['ball']?></td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php else : ?>
                    <h3 class="title title-resume">Для подбора специальностей перейдите на <a href="/fill">страницу ввода данных</a></h3>
                <?php endif;?>
            </div>

</section>