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
                                    <multiselect v-model="address_from.selected" :options="address.options"
                                                 label="name" track-by="id" :searchable="false"
                                                 :show-labels="false" :maxHeight="350"
                                                 group-values="area" group-label="place"
                                                 class="calc__dropdown calc__dropdown--from"></multiselect>
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
                                    <multiselect v-model="address_to.selected" :options="address.options"
                                                 label="name" track-by="id" :searchable="false"
                                                 :show-labels="false" :maxHeight="350"
                                                 group-values="area" group-label="place"
                                                 class="calc__dropdown calc__dropdown--to"></multiselect>
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
                                        <img :src ="wp_data.plugin_dir_url + car.selected.picture" alt="props.option.name"
                                             class="calc__img">
                                    </div>
                                    <div class="calc__heading">{{car.selected.name}}</div>
                                </div>
                                <div class="calc__selectbox">
                                    <multiselect v-model="car.selected" :options="car.options"
                                                 label="name" track-by="id" :searchable="false"
                                                 :show-labels="false" :maxHeight="270"
                                                 :option-height="58"
                                                 class="calc__dropdown calc__dropdown--selectbox">
                                        <template slot="option" slot-scope="props">
                                            <div class="item-down">
                                                <img :src="wp_data.plugin_dir_url + props.option.picture"
                                                     class="item-down--img" :alt="props.option.name"/>
                                                <div class="item-down--text">{{ props.option.name }}</div>
                                            </div>
                                        </template>
                                    </multiselect>
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
        <!--{{car.selected}}-->
    </form>
</template>

<script>
    import axios from 'axios';
    import _ from 'lodash';

    export default {
        name: 'app',
        data() {
            return {
                info: {
                    data: null,
                    loading: true,
                    errored: false,
                },
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
                },
                address_from: {
                    selected: {"id": 1, "name": "Центральный р-н"}
                },
                address_to: {
                    selected: {"id": 1, "name": "Центральный р-н"}
                },
                address: {
                    options: [{
                        place: 'г. Тольятти',
                        area: []
                    },
                        {
                            place: 'Пригород',
                            area: []
                        }
                    ]
                },
                car: {
                    selected: {
                        "id": 0,
                        "name": "Ларгус/пикап",
                        "picture": "assets/img/car/car01.jpg",
                        "size": "1,7м * 1,2м * 1м",
                        "carrying": "700 кг"
                    },
                    options: []
                }
            }
        },
        computed: {
            wp_data: function () {
                return window.wp_data;
            }
        },
        mounted() {
            axios
                .get(wp_data.plugin_dir_url + 'assets/price1.json')
                .then(response => {
                    this.info.data = response.data;

                    //Заполняем пункты назначения
                    let filterArray = _.filter(this.info.data.metadata.area, (item) => {
                        return item.id < 10;
                    });
                    _.forEach(filterArray, (item) => {
                        this.address.options[0].area.push(item);
                    });
                    filterArray = _.filter(this.info.data.metadata.area, (item) => {
                        return item.id >= 10;
                    });
                    filterArray = _.sortBy(filterArray, [(item) => {
                        return item.name;
                    }]);
                    _.forEach(filterArray, (item) => {
                        this.address.options[1].area.push(item);
                    });

                    //Заполняем список автомобилей
                    _.forEach(this.info.data.metadata.car, (item) => {
                        this.car.options.push(item);
                    });
                })
                .catch(error => {
                    console.log(error);
                    this.info.errored = true;
                })
                .finally(() => (this.info.loading = false));
        }
    }
</script>