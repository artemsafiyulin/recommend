<header class="head">
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-sm-11 col-lg-11">
                <img class="logo-page" src="/assets/img/profile_l.png" alt="Ukieweb">
                <h4 class="title" style="font-size: 28px">Карта абитуриента</h4>
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
                <h3 class="title title-resume">На данной странице представлены Ваши данные</h3>
                <div class="block-grey">
                    <div id="education-slider" class="owl-carousel owl-theme">
                        <div class="item">
                            <table class="table table-bordered table-stiped">
                                <tr>
                                    <td class="font-weight-m">ФИО</td>
                                    <td>
                                        <?= $this->session->userdata('last_name')?>
                                        <?= $this->session->userdata('first_name')?>
                                        <?= $this->session->userdata('middle_name')?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-m">Средний балл аттестата</td>
                                    <td><?= $this->session->userdata('attestat')?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-m">Балл ЕГЭ по математике</td>
                                    <td><?= $this->session->userdata('ege_math')?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-m">Балл ЕГЭ по физике</td>
                                    <td><?= $this->session->userdata('ege_phys')?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-m">Балл ЕГЭ по русскому языку</td>
                                    <td><?= $this->session->userdata('ege_russ')?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-m">Интересное направление</td>
                                    <td><?= $directionName ?? 'Не указано'?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

</section>