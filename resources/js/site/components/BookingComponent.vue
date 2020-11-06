<template>
    <div class="grid-x grid-padding-x" ref="booking">
        <div class="cell small-12">
            <ul class="menu vertical">
                <li
                    v-for="day in days"
                >
                    <div class="grid-x">
                        <div class="cell small-2 text-center wrap-day">
                            {{ day | formatListDate }}
                        </div>
                        <div class="cell small-8">
                            <ul class="menu horizontal list-time">
                                <li
                                    v-for="time in times"
                                    :class="[{'booked' : checkBooking(day, time)}, {'active' : checkActive(day, time)}]"
                                    @click="setBooking(day, time)"
                                >
                                    {{ time }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
            <input
                type="hidden"
                name="booked_at"
                v-model="bookedAt"
            >
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import 'moment/locale/ru';

    export default {
        props: {
            quest: Object,
        },
        data() {
            return {
                date: moment(String(new Date())),
                times: [
                    '10:00',
                    '11:30',
                    '13:00',
                    '14:30',
                    '16:00',
                    '17:30',
                    '19:00',
                    '20:30',
                ],

                bookings: this.quest.active_bookings,

                bookedAt: null,

                name: null,
                phone: null,
                email: null,
            }
        },
        mounted() {
            moment.locale('ru');
        },
        computed: {
            days() {
                let data = [];
                for (let i = 0; i < 7; i++) {
                    data.push(moment(String(this.date)).add('days', i));
                }
                return data;
            },
        },
        methods: {
            checkBooking(day, time) {
                const value = moment(String(day)).format('YYYY-MM-DD') + ' ' + time + ':00';
                const found = this.bookings.find(booking => moment(booking.booked_at, 'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD HH:mm:ss') == value);
                return !!found;
            },
            checkActive(day, time) {
                return moment(this.bookedAt, 'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD HH:mm:ss') == (moment(String(day)).format('YYYY-MM-DD') + ' ' + time + ':00');
            },
            setBooking(day, time) {
                if (!this.checkBooking(day, time)) {
                    this.bookedAt = moment(String(day)).format('YYYY-MM-DD') + ' ' + time + ':00';
                    this.scroll();
                }
            },
            async scroll() {
                let slide = this.$refs['booking']
                let top = window.scrollY + slide.getBoundingClientRect().y;
                window.scrollTo(0, top)

                // let count = 100;
                // let start_top = window.scrollY;
                // // Вычисление перемещения (скролла) за одну итерацию
                // let delta = (top - window.scrollY) / 100;
                // // Начало анимации
                // for (let i = 0; i < 100; i++) {
                //     // Ожидание 1 секунды, деленного на качетсво анимации
                //     await new Promise(resolve => {
                //         window.setTimeout(function () {
                //             resolve()
                //         }, 1000 / count)
                //     });
                //     // Выполнение перемещения на значение delta с учетом текущего скролла
                //     window.scrollTo(0, start_top + delta)
                // }
            }
        },
        filters: {
            formatListDate(value) {
                return moment(value).format('DD MMMM dd');
            },
            formatDate(value) {
                return moment(value, 'YYYY-MM-DD HH:mm:ss').format('DD MMMM YYYY');
            },
            formatTime(value) {
                return moment(value, 'YYYY-MM-DD HH:mm:ss').format('HH:mm');
            },
        },
    }
</script>
