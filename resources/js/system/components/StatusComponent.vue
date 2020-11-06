<template>
    <td class="input-group">
        <select
            class="input-group-field"
            v-model="statusId"
            @change="changeStatus"
            :disabled="disabled"
        >
            <option
                v-for="status in statuses"
                :value="status.id"
            >{{ status.title}}
            </option>
        </select>
        <div
            v-if="change"
            class="input-group-button"
        >
            <button
                class="button tiny"
                @click="updateStatus"
            >Сохранить
            </button>
        </div>
        <div
            class="input-group-button"
            v-if="loading"
        >Обновляем...</div>
    </td>
</template>

<script>
    export default {
        props: {
            statuses: Array,
            item: Object
        },
        data() {
            return {
                statusId: this.item.status_id,
                change: false,
                loading: false,
                disabled: this.item.status_id == 3,
            }
        },
        methods: {
            changeStatus() {
                this.change = true;
            },
            updateStatus() {
                this.change = false;
                this.loading = true;
                axios
                    .patch('/system/bookings/' + this.item.id, {
                        status_id: this.statusId
                    })
                    .then(response => {
                        if (this.statusId == 3) {
                            this.disabled = true;
                        }
                        // console.log(response.data);
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    .finally(() => (this.loading = false));
            }
        }

    }
</script>
