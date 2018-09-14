<template>
    <form method="POST" class="calc__form">
        <div class="calc" id="calc-shipment">
            <div class="calc__head">
                <div class="calc__title">Заказ грузового такси
                </div>
                <div class="calc__title calc__title--links">
                    <a href="#" class="calc__link--undo hvr-pop">
                        <i class="fas fa-undo"></i>
                        <span class="calc__link--text" @click.prevent="clearData">Очистить</span>
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
                                                 :show-labels="false" :maxHeight="250"
                                                 group-values="area" group-label="place"
                                                 class="calc__dropdown calc__dropdown--from"
                                                 :allow-empty="false"></multiselect>
                                </div>
                                <div class="calc__address">
                                    <input type="text"
                                           placeholder="Улица" v-model="address_from.street"
                                           :class="{'calc__input': true, 'calc__input--street': true, 'is-danger': errors.has('calc__street-from') }"
                                           v-validate.disable="'required'" name="calc__street-from">
                                    <input type="text" value="" class="calc__input calc__input--house"
                                           placeholder="Дом" v-model="address_from.house">
                                    <input type="text" value="" class="calc__input calc__input--entrance"
                                           placeholder="Под" v-model="address_from.entrance">
                                    <div class="calc__ic"><i class="fas fa-map-marker-alt calc__icon"></i></div>
                                </div>
                            </div>
                            <div class="calc__item calc__item--two">
                                <div class="calc__box-select">
                                    <div class="calc__desc">Куда</div>
                                    <multiselect v-model="address_to.selected" :options="address.options"
                                                 label="name" track-by="id" :searchable="false"
                                                 :show-labels="false" :maxHeight="250"
                                                 group-values="area" group-label="place"
                                                 class="calc__dropdown calc__dropdown--to"
                                                 :allow-empty="false"></multiselect>
                                </div>
                                <div class="calc__address">
                                    <input type="text" value=""
                                           placeholder="Улица" v-model="address_to.street"
                                           :class="{'calc__input': true, 'calc__input--street': true, 'is-danger': errors.has('calc__street-to') }"
                                           v-validate.disable="'required'" name="calc__street-to">
                                    <input type="text" value="" class="calc__input calc__input--house"
                                           placeholder="Дом" v-model="address_to.house">
                                    <input type="text" value="" class="calc__input calc__input--entrance"
                                           placeholder="Под" v-model="address_to.entrance">
                                    <div class="calc__ic"><i class="fas fa-map-marker-alt calc__icon"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="calc__row calc__row--two">
                            <div class="calc__item calc__item--three">
                                <label for="calc__name" class="calc__label">Имя</label>
                                <input id="calc__name" value=""
                                       :class="{'calc__input': true, 'calc__input--name': true, 'is-danger': errors.has('calc__name') }"
                                       placeholder="Представьтесь" v-model="contact.name"
                                       v-validate.disable="'required|alpha'"
                                       name="calc__name">

                            </div>
                            <div class="calc__item calc__item--four">
                                <label for="calc__phone" class="calc__label">Телефон</label>
                                <input id="calc__phone"
                                       :class="{'calc__input': true, 'calc__input--phone': true, 'is-danger': errors.has('calc__phone') }"
                                       placeholder="Ваш номер" v-model="contact.phone" ref="phone"
                                       v-validate.disable="'required'" name="calc__phone">
                            </div>
                        </div>
                        <div class="calc__row calc__row--three">
                            <button type="button" class="btn" @click.prevent="validateContact" ref="btnContinue"
                                    v-if="formResult">
                                Продолжить
                            </button>
                            <div class="calc__desc calc__desc--personal" v-else>
                                Нажимая кнопку «Оформить заказ», вы соглашаетесь
                                на <a href="#" class="calc__link calc__link--personal">обработку ваших персональных данных</a>
                            </div>

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
                                    <a href="#" class="calc__info-link" @click="openSimplert">
                                        <i class="fas fa-info-circle calc__icon"></i>
                                    </a>
                                    <div class="calc__picture">
                                        <img :src="wp_data.plugin_dir_url + car.selected.picture"
                                             alt="props.option.name"
                                             class="calc__img">
                                    </div>
                                    <div class="calc__heading">{{car.selected.name}}</div>
                                </div>
                                <div class="calc__selectbox">
                                    <multiselect v-model="car.selected" :options="car.options"
                                                 label="name" track-by="id" :searchable="false"
                                                 :show-labels="false" :maxHeight="270"
                                                 :option-height="58"
                                                 class="calc__dropdown calc__dropdown--selectbox" :allow-empty="false">
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
                                                 class="calc__dropdown calc__dropdown--loaders"
                                                 :allow-empty="false"></multiselect>
                                    <div class="calc__desc calc__desc--cargo-time">Время работы</div>
                                    <multiselect v-model="cargo_time.selected" :options="cargo_time.options"
                                                 label="label" track-by="id" :searchable="false"
                                                 :show-labels="false" :maxHeight="200"
                                                 class="calc__dropdown calc__dropdown--cargo-time" :allow-empty="false"
                                    ></multiselect>
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
                            <input class="calc__input calc__input--number" ref="card" v-model="card.serial">
                            <button type="button" class="btn btn--client" ref="btnCheck" @click.prevent="validateCard">
                                Проверить
                            </button>
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
                                             label="name" track-by="id" :searchable="false"
                                             :show-labels="false" :maxHeight="200"
                                             class="calc__dropdown calc__dropdown--time"
                                             :allow-empty="false"></multiselect>
                            </div>
                            <div class="calc__item calc__item--six">
                                <i class="far fa-calendar-alt calc__icon"></i>
                                <datetime type="datetime" v-model="calendar.datetime" class='calc__input--datepicker'
                                          :phrases="{ok: 'Ok', cancel: 'Выход'}" :minute-step="10"
                                          :format="{ year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: '2-digit'}"
                                          value-zone="Europe/Samara" :value="calendar.datetime"
                                ></datetime>
                            </div>
                            <div class="calc__item calc__item--seven">
                                <div class="calc__desc calc__desc--durability">Длительность заказа</div>
                                <multiselect v-model="durability.selected" :options="durability_options"
                                             label="label" track-by="id" :searchable="false"
                                             :show-labels="false" :maxHeight="200"
                                             class="calc__dropdown calc__dropdown--durability"
                                             :allow-empty="false"></multiselect>
                            </div>
                            <div class="calc__item calc__item--eight">
                                <a href="#" class="calc__link--plus" @click.prevent="inverseShowNote">
                                    <i class="fas fa-plus calc__icon calc__plus"></i>
                                    <span class="calc__desc calc__desc--plus">Примечание к заказу</span>
                                </a>
                                <textarea class='calc__input calc__input--note'
                                          v-show="note.visibility" v-model="note.text"></textarea>
                            </div>
                            <div class="calc__price">
                                <div class="calc__item calc__item--nine">
                                    <span class="calc__price-text">Обычная цена</span>
                                    <span class="calc__price-number" id="calc__price-number">{{price_normal}}</span>
                                    <span class="calc__rub"><i class="fas fa-ruble-sign calc__price-rub"></i></span>
                                </div>
                                <div class="calc__item calc__item--ten">
                                    <div class="calc__box-discount">
                                        <span class="calc__discount">Экономия</span>
                                        <span class="calc__discount-number"
                                              id="calc__discount-number">{{discount}}</span>
                                        <span class="calc__discount-percent">%</span>
                                    </div>
                                    <div class="calc__box-discount-price">
                                        <span class="calc__discount-sum" id="calc__discount-sum">{{economy}}</span>
                                        <span class="calc__rub"><i
                                                class="fas fa-ruble-sign calc__discount-rub"></i></span>
                                    </div>
                                </div>
                                <div class="calc__item calc__item--eleven">
                                    <div class="calc__result-text">Итого со скидкой</div>
                                    <div class="calc__box-result-price">
                                        <span class="calc__result-sum"
                                              id="calc__result-sum">{{animated_price_result}}</span>
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
            <simplert :useRadius="true" :useIcon="true" ref="simplert">
            </simplert>
        </div>
        <!--{{contact}}-->
    </form>
</template>

<script>
    import axios from 'axios';
    import _ from 'lodash';
    import {DateTime} from 'luxon';
    import Inputmask from 'inputmask';
    //    import {TweenLite} from "TweenMax";
    import {TweenLite} from 'gsap';

    //простой расчет цены услуги
    let pricePlus = (obj, durability) => {
        let curPrice = 0;
        if (!_.isEmpty(obj)) {
            curPrice += obj.min_price;
            if (durability > obj.min_time) {
                curPrice += obj.additional_price * (durability - obj.min_time);
            }
        }
        return curPrice;
    }

    //добавляем анимацию к объекту
    let animateObj = (obj, className) => {
        obj.classList.add(className);

        setTimeout(function () {
            obj.classList.remove(className);
        }, 1000);
    }

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
                time_delivery: {
                    selected: {"id": 0, "name": "Срочная (30 минут)"},
                    options: []
                },
                durability: {
                    selected: {id: 1, label: '1 час', $isDisabled: false}
                },
                address_from: {
                    selected: {"id": 1, "name": "Центральный р-н"},
                    street: '',
                    house: '',
                    entrance: ''
                },
                address_to: {
                    selected: {"id": 1, "name": "Центральный р-н"},
                    street: '',
                    house: '',
                    entrance: ''
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
                        "carrying": "700 кг",
                        "desc": "подходит для загородного переезда, перевозки стройматериалов"
                    },
                    options: []
                },
                calendar: {
                    datetime: null
                },
                note: {
                    visibility: false,
                    text: ''
                },
                objAlert: {
                    title: '',
                    message: '',
                    type: 'info',
                    customCloseBtnClass: 'btn btn--modal',
                    customCloseBtnText: 'Ok'
                },
                contact: {
                    name: '',
                    phone: ''
                },
                card: {
                    serial: ''
                },
                formResult: true,
                discount: 0,
                card_data: null,
                tweened_price_normal: 0
            }
        },
        computed: {
            wp_data: function () {
                return window.wp_data;
            },
            durability_options: function () {
                //блокируем пункты выпадающего списка в зависимости от типа машины, времени подачи и адреса подачи
                let data = [
                    {id: 1, label: '1 час', $isDisabled: false},
                    {id: 2, label: '2 часа', $isDisabled: false},
                    {id: 3, label: '3 часа', $isDisabled: false},
                    {id: 4, label: '4 часа', $isDisabled: false},
                    {id: 5, label: '5 часов', $isDisabled: false},
                    {id: 6, label: '6 часов', $isDisabled: false},
                    {id: 7, label: '7 часов', $isDisabled: false},
                    {id: 8, label: '8 часов', $isDisabled: false}
                ];

                let car_id = this.car.selected.id;
                let time_delivery_id = this.time_delivery.selected.id;
                let address_to_id = this.address_to.selected.id;

                if (car_id <= 2 && time_delivery_id === 1 && address_to_id < 10) {
                    data[0].$isDisabled = true;
                } else if (car_id === 3) {
                    data[0].$isDisabled = true;
                } else if (car_id === 4 || car_id === 5) {
                    data[0].$isDisabled = true;
                    data[1].$isDisabled = true;
                } else if (address_to_id >= 10) {
                    data[0].$isDisabled = true;
                }

                //если уже установлен заблокированный элемент, меняем на первый за ним незаблокированный
                if (data[this.durability.selected.id - 1].$isDisabled) {
                    this.durability.selected = _.find(data, ['$isDisabled', false]);
                }

                return data;
            },
            price_normal: function () {
                let priceNormal = 0;

                //текущие адреса
                let address_from_id = this.address_from.selected.id;
                let address_to_id = this.address_to.selected.id;

                //текущий автомобиль
                let car_id = this.car.selected.id;

                //грузчики
                let loaders_id = this.loaders.selected.id;
                let cargo_time_id = this.cargo_time.selected.id;

                //время подачи
                let time_delivery_id = this.time_delivery.selected.id;

                //длительность заказа
                let durability_id = this.durability.selected.id;


                if (!_.isEmpty(this.info.data)) {
                    //коллекция цен
                    let priceData = this.info.data.price;

                    //коллекция цен грузчиков
                    let priceLoader = this.info.data.price_loader;

                    let currentPrice = 0, current = {}, current1 = {};

                    if (car_id >= 3 && car_id <= 5) {
                        current = _.find(priceData, {'car_id': car_id});
                        currentPrice += pricePlus(current, durability_id);
                    } else if (address_from_id < 10) {
                        //расчет цены между районов внутри города
                        if (address_to_id < 10) {
                            //доставка срочная или плановая
                            if (time_delivery_id === 0) {
                                current = _.find(priceData, {'car_id': car_id, 'time_delivery_id': 0});
                            } else {
                                current = _.find(priceData, {
                                    'car_id': car_id,
                                    'time_delivery_id': 1,
                                    'address_from': address_from_id,
                                    'address_to': address_to_id
                                });
                            }
                        } else {
                            //расчет город - пригород
                            current = _.find(priceData, {
                                'car_id': car_id,
                                'time_delivery_id': 1,
                                'address_to': address_to_id
                            });

                        }

                        currentPrice += pricePlus(current, durability_id);

                    } else {
                        // расчет пригород - город
                        if (address_to_id < 10) {
                            current = _.find(priceData, {
                                'car_id': car_id,
                                'time_delivery_id': 1,
                                'address_to': address_from_id
                            });

                            currentPrice += pricePlus(current, durability_id);

                        } else {
                            //расчет пригород - пригород
                            current = _.find(priceData, {
                                'car_id': car_id,
                                'time_delivery_id': 1,
                                'address_to': address_from_id
                            });
                            current1 = _.find(priceData, {
                                'car_id': car_id,
                                'time_delivery_id': 1,
                                'address_to': address_to_id
                            });

                            if (!_.isEmpty(current) && !_.isEmpty(current1)) {
                                currentPrice += current.min_price;
                                currentPrice += current1.min_price;

                                if (durability_id > current.min_time) {
                                    currentPrice += current.additional_price * (durability_id - current.min_time);
                                }
                            }
                        }
                    }
                    priceNormal += currentPrice;

                    let loaders__price = 0;
                    if (loaders_id !== 0) {
                        if (time_delivery_id === 0) {
                            current = _.find(priceLoader, {'time_delivery_id': 0});
                            if (!_.isEmpty(current)) {
                                loaders__price = current.min_price * cargo_time_id * loaders_id;
                            }
                        } else {
                            current = _.find(priceLoader, {'time_delivery_id': 1});

                            if (!_.isEmpty(current)) {
                                loaders__price += current.min_price * loaders_id;

                                if (cargo_time_id > current.min_time) {
                                    loaders__price += current.additional_price * (cargo_time_id - current.min_time) * loaders_id;
                                }
                            }
                        }
                    }

                    priceNormal += loaders__price;
                }
                return priceNormal;

            },
            economy: function () {
                return Math.round(this.price_normal * this.discount / 100);
            },
            price_result: function () {
                return this.price_normal - this.economy;
            },
            animated_price_result: function () {
                return this.tweened_price_normal.toFixed(0);
            }
        },
        methods: {
            inverseShowNote: function () {
                this.note.visibility = !this.note.visibility;
            },
            openSimplert: function () {
                this.objAlert.title = this.car.selected.name;
                this.objAlert.message = '<div class="calc__modal">' +
                    '<div class="calc__modal-desc">' + this.car.selected.desc + '</div>' +
                    '<div class="calc__modal-charater">' +
                    '<div class="calc__modal-text">Габаритные размеры</div>' +
                    '<div class="calc__modal-info">' + this.car.selected.size + '</div>' +
                    '<div class="calc__modal-text">Грузоподъемность</div>' +
                    '<div class="calc__modal-info">до ' + this.car.selected.carrying + '</div>' +
                    '</div></div>';
                this.$refs.simplert.openSimplert(this.objAlert);
            },
            validateContact() {
                this.$validator.validateAll()
                    .then((result) => {
                        if (result) {
                            this.formResult = !this.formResult;
                            return;
                        }

                        let btnContinue = this.$refs.btnContinue;
                        animateObj(btnContinue, 'hvr-buzz-out');
                    });
            },
            validateCard() {
                let numberCard = this.card.serial;
                numberCard = numberCard.split('-').join('');
                let serial = this.card_data.serial;
                var result = serial.includes(numberCard);
                if (result) {
                    animateObj(this.$refs.card, 'is-success');
                    this.discount = this.card_data.discount;
                } else {
                    this.discount = 0;
                    animateObj(this.$refs.card, 'is-danger');
                    animateObj(this.$refs.btnCheck, 'hvr-buzz-out');
                }
            },
            clearData() {
                this.loaders.selected = {id: 0, label: 'Нет'};
                this.cargo_time.selected = {id: 1, label: '1 час'};
                this.time_delivery.selected = {"id": 0, "name": "Срочная (30 минут)"};
                this.durability.selected = {id: 1, label: '1 час', $isDisabled: false};
                this.address_from.selected = {"id": 1, "name": "Центральный р-н"};
                this.address_from.street = '';
                this.address_from.house = '';
                this.address_from.entrance = '';
                this.address_to.selected = {"id": 1, "name": "Центральный р-н"};
                this.address_to.street = '';
                this.address_to.house = '';
                this.address_to.entrance = '';
                this.car.selected = {
                    "id": 0,
                    "name": "Ларгус/пикап",
                    "picture": "assets/img/car/car01.jpg",
                    "size": "1,7м * 1,2м * 1м",
                    "carrying": "700 кг",
                    "desc": "подходит для загородного переезда, перевозки стройматериалов"
                };
                this.calendar.datetime = DateTime.local().toISO();
                this.note.visibility = false;
                this.note.text = '';
                this.contact.name = '';
                this.contact.phone = '';
                this.card.serial = '';
                this.discount = 0;
            }
        },
        watch: {
            price_result: function (newValue) {
                TweenLite.to(this.$data, 1, {tweened_price_normal: newValue});
            }
        },
        mounted() {
            axios
                .all([axios.get(wp_data.plugin_dir_url + 'assets/json/price1.json'),
                    axios.get(wp_data.plugin_dir_url + 'assets/json/card.json')])
                .then(axios.spread((response, card_response) => {
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

                    //Заполняем время подачи
                    _.forEach(this.info.data.metadata.time_delivery, (item) => {
                        this.time_delivery.options.push(item);
                    });

                    //устанавливаем время
                    this.calendar.datetime = DateTime.local().toISO();

                    //устанавливаем маску телефона
                    let im = new Inputmask("+7 (999) 999 99 99");
                    im.mask(this.$refs.phone);

                    let im1 = new Inputmask("99999-99999");
                    im1.mask(this.$refs.card);

                    this.card_data = card_response.data;
                }))
                .catch(error => {
                    console.log(error);
                    this.info.errored = true;
                })
                .finally(() => (this.info.loading = false));
        }
    }
</script>