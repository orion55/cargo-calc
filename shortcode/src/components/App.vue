<template>
    <form method="POST" class="calc__form">
        <div class="calc" id="calc-shipment">
            <div class="calc__head">
                <div class="calc__title">Заказ грузового такси
                </div>
                <div class="calc__title calc__title--links">
                    <a href="#" class="calc__link--undo hvr-pop">
                        <i class="fas fa-undo"></i>
                        <span class="calc__link--text">Очистить</span>
                    </a>
                    <a href="#" class="calc__link--close hvr-pop">
                        <i class="fas fa-times-circle"></i>
                    </a>
                </div>
            </div>
            <div class="calc__megabox">
                <div class="calc__one">
                    <div class="calc__block">
                        <div class="calc__stage calc__stage--one">
                            <div class="calc__caption calc__caption--one"><span class="calc__wide">Шаг 1:</span> Маршрут
                                и
                                контакты
                            </div>
                        </div>
                        <div class="calc__row calc__row--one">
                            <div class="calc__item calc__item--one">
                                <div class="calc__box-select">
                                    <div class="calc__desc">Откуда</div>
                                    <select class="calc__dropdown calc__dropdown--from">
                                        <optgroup label="г. Тольятти">
                                            <option value="area01">Автозаводский р-н</option>
                                            <option value="area02" selected>Центральный р-н</option>
                                            <option value="area03">Комсомольский р-н</option>
                                            <option value="area04">Жиг.море\Шлюзовый</option>
                                        </optgroup>
                                        <optgroup label="Пригород">
                                            <option value="area05">Ягодное</option>
                                            <option value="area06">Тимофеевка</option>
                                            <option value="area07">Русская Борковка</option>
                                            <option value="area08">Ниж. Санчелеево</option>
                                            <option value="area09">Верх. Санчелеево</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="calc__address">
                                    <input type="text" value="" class="calc__input calc__input--street"
                                           placeholder="Улица">
                                    <input type="text" value="" class="calc__input calc__input--house"
                                           placeholder="Дом">
                                    <input type="text" value="" class="calc__input calc__input--entrance"
                                           placeholder="Под">
                                    <div class="calc__ic"><i class="fas fa-map-marker-alt calc__icon"></i></div>
                                </div>
                            </div>
                            <div class="calc__item calc__item--two">
                                <div class="calc__box-select">
                                    <div class="calc__desc">Куда</div>
                                    <select class="calc__dropdown calc__dropdown--to">
                                        <optgroup label="г. Тольятти">
                                            <option value="area01">Автозаводский р-н</option>
                                            <option value="area02" selected>Центральный р-н</option>
                                            <option value="area03">Комсомольский р-н</option>
                                            <option value="area04">Жиг.море\Шлюзовый</option>
                                        </optgroup>
                                        <optgroup label="Пригород">
                                            <option value="area05">Ягодное</option>
                                            <option value="area06">Тимофеевка</option>
                                            <option value="area07">Русская Борковка</option>
                                            <option value="area08">Ниж. Санчелеево</option>
                                            <option value="area09">Верх. Санчелеево</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="calc__address">
                                    <input type="text" value="" class="calc__input calc__input--street"
                                           placeholder="Улица">
                                    <input type="text" value="" class="calc__input calc__input--house"
                                           placeholder="Дом">
                                    <input type="text" value="" class="calc__input calc__input--entrance"
                                           placeholder="Под">
                                    <div class="calc__ic"><i class="fas fa-map-marker-alt calc__icon"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="calc__row calc__row--two">
                            <div class="calc__item calc__item--three">
                                <label for="calc__name" class="calc__label">Имя</label>
                                <input id="calc__name" value="" class="calc__input calc__input--name"
                                       placeholder="Представьтесь">
                            </div>
                            <div class="calc__item calc__item--four">
                                <label for="calc__phone" class="calc__label">Телефон</label>
                                <input id="calc__phone" value="" class="calc__input calc__input--phone"
                                       placeholder="Ваш номер">
                            </div>
                        </div>
                        <div class="calc__row calc__row--three">
                            <button type="button" class="btn">Продолжить</button>
                        </div>
                    </div>
                </div>
                <div class="calc__two">
                    <div class="calc__block">
                        <div class="calc__stage calc__stage--two">
                            <div class="calc__caption calc__caption--two"><span class="calc__wide">Шаг 2:</span> Подбор
                                машины
                            </div>
                        </div>
                        <div class="calc__box calc__box--car">
                            <div class="calc__container">
                                <div class="calc__wrapper">
                                    <a href="#" class="calc__info-link">
                                        <i class="fas fa-info-circle calc__icon"></i>
                                    </a>
                                    <div class="calc__picture">
                                        <img src="http://master-gruzov.ru/wp-content/plugins/cargo-calc/shortcode/assets/img/car/car01.jpg"
                                             alt="car01" class="calc__img">
                                    </div>
                                    <div class="calc__heading">Ларгус/пикап</div>
                                </div>
                                <div class="calc__selectbox">
                                    <select class="calc__dropdown calc__dropdown--selectbox" size="4">
                                        <option value="car01" selected>Ларгус/пикап</option>
                                        <option value="car02">Газель 3 метра</option>
                                        <option value="car02">Газель 4 метра</option>
                                        <option value="car03">Isuzu 6 метров</option>
                                        <option value="car04">Man 6-7 метров</option>
                                        <option value="car04">Man 7-8 метров</option>
                                    </select>
                                </div>
                            </div>
                            <div class="calc__holder">
                                <div class="calc__inner">
                                    <div class="calc__desc calc__desc--cargo">Грузчики</div>
                                    <multiselect v-model="loaders.selected" :options="loaders.options"
                                                 label="label" track-by="id" :searchable="false"
                                                 :show-labels="false" :maxHeight="200"
                                                 class="calc__dropdown calc__dropdown--loaders"></multiselect>
                                    <div class="calc__desc calc__desc--cargo-time">Время работы</div>
                                    <multiselect v-model="cargo_time.selected" :options="cargo_time.options"
                                                 label="label" track-by="id" :searchable="false"
                                                 :show-labels="false" :maxHeight="200"
                                                 class="calc__dropdown calc__dropdown--cargo-time"></multiselect>
                                </div>
                            </div>
                        </div>
                        <div class="calc__stage calc__stage--three">
                            <div class="calc__caption calc__caption--three"><span class="calc__wide">Шаг 3:</span>
                                получения
                                скидки
                            </div>
                        </div>
                        <div class="calc__box calc__box--client">
                            <div class="calc__desc calc__desc--client">Номер карты постоянного клиента</div>
                            <input class="calc__input calc__input--number">
                            <button type="button" class="btn btn--client">Проверить</button>
                        </div>
                    </div>
                </div>
                <div class="calc__three">
                    <div class="calc__block calc__block--three">
                        <div class="calc__stage calc__stage--four">
                            <div class="calc__caption calc__caption--four"><span class="calc__wide">Шаг 4:</span> Время
                                и
                                длительность
                            </div>
                        </div>
                        <div class="calc__row calc__row--four">
                            <div class="calc__item calc__item--five">
                                <div class="calc__desc calc__desc--time">Время подачи</div>
                                <multiselect v-model="time_delivery.selected" :options="time_delivery.options"
                                             label="label" track-by="id" :searchable="false"
                                             :show-labels="false" :maxHeight="200"
                                             class="calc__dropdown calc__dropdown--time"></multiselect>
                            </div>
                            <div class="calc__item calc__item--six">
                                <i class="far fa-calendar-alt calc__icon"></i>
                                <input type='text' class='calc__input calc__input--datepicker datepicker-here'
                                       data-timepicker="true"/>
                            </div>
                            <div class="calc__item calc__item--seven">
                                <div class="calc__desc calc__desc--durability">Длительность заказа</div>
                                <multiselect v-model="durability.selected" :options="durability.options"
                                             label="label" track-by="id" :searchable="false"
                                             :show-labels="false" :maxHeight="200"
                                             class="calc__dropdown calc__dropdown--durability"></multiselect>
                                <!--<v-select v-model="durability.selected" :options="durability.options" :searchable=false
                                          class="calc__dropdown calc__dropdown&#45;&#45;durability">
                                </v-select>-->
                            </div>
                            <div class="calc__item calc__item--eight">
                                <a href="#" class="calc__link--plus">
                                    <i class="fas fa-plus calc__icon calc__plus"></i>
                                    <span class="calc__desc calc__desc--plus">Примечание к заказу</span>
                                </a>
                                <textarea class='calc__input calc__input--note calc__hide'/></textarea>
                            </div>
                            <div class="calc__price">
                                <div class="calc__item calc__item--nine">
                                    <span class="calc__price-text">Обычная цена</span>
                                    <span class="calc__price-number" id="calc__price-number">1290</span>
                                    <span class="calc__rub"><i class="fas fa-ruble-sign calc__price-rub"></i></span>
                                </div>
                                <div class="calc__item calc__item--ten">
                                    <div class="calc__box-discount">
                                        <span class="calc__discount">Экономия</span>
                                        <span class="calc__discount-number" id="calc__discount-number">5</span>
                                        <span class="calc__discount-percent">%</span>
                                    </div>
                                    <div class="calc__box-discount-price">
                                        <span class="calc__discount-sum" id="calc__discount-sum">400</span>
                                        <span class="calc__rub"><i
                                                class="fas fa-ruble-sign calc__discount-rub"></i></span>
                                    </div>
                                </div>
                                <div class="calc__item calc__item--eleven">
                                    <div class="calc__result-text">Итого со скидкой</div>
                                    <div class="calc__box-result-price">
                                        <span class="calc__result-sum" id="calc__result-sum">890</span>
                                        <span class="calc__rub"><i
                                                class="fas fa-ruble-sign  calc__result-rub"></i></span>
                                    </div>
                                </div>
                                <button type="button" class="btn btn--result hvr-radial-out">Оформить заказ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        name: 'app',
        data() {
            return {
                value: '',
                options: ['Select option', 'options', 'selected', 'mulitple', 'label', 'searchable', 'clearOnSelect', 'hideSelected', 'maxHeight', 'allowEmpty', 'showLabels', 'onChange', 'touched'],
                loaders: {
                    selected: {id: 0, label: 'Нет'},
                    options: [
                        {id: 0, label: 'Нет'},
                        {id: 1, label: '1'},
                        {id: 2, label: '2'},
                        {id: 3, label: '3'},
                        {id: 4, label: '4'}
                    ]
                },
                cargo_time: {
                    selected: {id: 0, label: 'Нет'},
                    options: [
                        {id: 0, label: 'Нет'},
                        {id: 1, label: '1 час'},
                        {id: 2, label: '2 часа'},
                        {id: 3, label: '3 часа'},
                        {id: 4, label: '4 часа'},
                        {id: 5, label: '5 часов'},
                        {id: 6, label: '6 часов'},
                        {id: 7, label: '7 часов'},
                        {id: 8, label: '8 часов'}
                    ]
                },
                time_delivery: {
                    selected: {id: 0, label: 'Срочная (30 минут)'},
                    options: [
                        {id: 0, label: 'Срочная (30 минут)'},
                        {id: 1, label: 'Плановая'}
                    ]
                },
                durability: {
                    selected: {id: 1, label: '1 час'},
                    options: [
                        {id: 1, label: '1 час'},
                        {id: 2, label: '2 часа'},
                        {id: 3, label: '3 часа'},
                        {id: 4, label: '4 часа'},
                        {id: 5, label: '5 часов'},
                        {id: 6, label: '6 часов'},
                        {id: 7, label: '7 часов'},
                        {id: 8, label: '8 часов'}
                    ]
                }
            }
        }
    }
</script>