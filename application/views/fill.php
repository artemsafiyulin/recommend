<header class="head">
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-sm-11 col-lg-11">
                <img class="logo-page" src="./assets/img/contact_l.png" alt="Ukieweb">
                <h2 class="title">Ввод данных</h2>

            </div>
            <div class="col-xs-4 col-sm-1 col-lg-1 text-right">
                <a href="/" class="btn-close hover-animate"></a>
            </div>
        </div>
    </div>
</header>

<section class="content padding-block border-bottom">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h3 class="title title-contact">В ниже приведенных формах укажите личные данные</h3>
                <div class="contact-form">
                    <?= form_open(current_url(), ['id' => 'contact-form']) ?>
                        <input
                                type="text"
                                name="data[last_name]"
                                value="<?= $this->session->userdata('last_name') ?? ''?>"
                                placeholder="Фамилия"
                                required
                        />
                        <input
                                type="text"
                                name="data[first_name]"
                                value="<?= $this->session->userdata('first_name') ?? ''?>"
                                placeholder="Имя"
                                required
                        />
                        <input
                                type="text"
                                name="data[middle_name]"
                                value="<?= $this->session->userdata('middle_name') ?? ''?>"
                                placeholder="Отчество"
                                required
                        />
                        <h3 class="title title-contact">Введите баллы ЕГЭ</h3>
                        <input
                                type="numeric"
                                name="data[ege_math]"
                                value="<?= $this->session->userdata('ege_math') ?? ''?>"
                                placeholder="Балл ЕГЭ по Математике"
                                required
                                oninvalid="this.setCustomValidity('Необходимо указать целое положительное число')"
                                onvalid="this.setCustomValidity('')"
                        />
                        <input
                                type="numeric"
                                name="data[ege_phys]"
                                value="<?= $this->session->userdata('ege_phys') ?? ''?>"
                                placeholder="Балл ЕГЭ по Физике"
                                required
                                oninvalid="this.setCustomValidity('Необходимо указать целое положительное число')"
                                onvalid="this.setCustomValidity('')"
                        />
                        <input
                                type="numeric"
                                name="data[ege_russ]"
                                value="<?= $this->session->userdata('ege_russ') ?? ''?>"
                                placeholder="Балл ЕГЭ по Русскому языку"
                                required
                                oninvalid="this.setCustomValidity('Необходимо указать целое положительное число')"
                                onvalid="this.setCustomValidity('')"
                        />
                        <h3 class="title title-contact">Введите средний балл аттестата</h3>
                        <input
                            type="numeric"
                            name="data[attestat]"
                            value="<?= $this->session->userdata('attestat') ?? ''?>"
                            placeholder="Средний балл аттестата"
                            oninvalid="this.setCustomValidity('Необходимо указать целое или дробное число. Разделитель дробной части - точка')"
                            onvalid="this.setCustomValidity('')"
                        />
                        <h3 class="title title-contact">Выберите интересное Вам направление</h3>
                        <select class="form-control" name="data[direction]" required>
                            <option></option>
                            <?php foreach ($directions ?? [] as $direction) : ?>
                            <option
                                <?= (int) $this->session->userdata('direction') === (int) $direction['id'] ? 'selected' : ''?>
                                value="<?= $direction['id']?>"
                            ><?= $direction['name']?></option>
                            <?php endforeach;?>
                        </select>

                        <div class="footer-form">
                            <input
                                type="submit"
                                id="submit-btn"
                                class="btn btn-color hover-animate"
                                value="Подтвердить"
                            />
                        </div>
                    <?= form_close();?>
                </div>
            </div>
        </div>
    </div>
</section>