<template>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>
                            <strong>{{ $t('admin.order.form.name') }}</strong>
                        </label>
                        <input
                            name="name"
                            type="text"
                            v-model="model.name"
                            class="form-control"
                            :class="{ 'border-danger': errors.name }"
                        >
                        <div v-for="(error, i) in errors.name"
                             :key="`name__error__${i}`"
                             class="text-danger error"
                        >
                            {{ error }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>{{ $t('admin.order.form.phone') }}</strong>
                        </label>
                        <input
                            name="phone"
                            type="text"
                            v-model="model.phone"
                            class="form-control"
                            :class="{ 'border-danger': errors.phone }"
                        >
                        <div v-for="(error, i) in errors.phone"
                             :key="`phone__error__${i}`"
                             class="text-danger error"
                        >
                            {{ error }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>{{ $t('admin.order.form.email') }}</strong>
                        </label>
                        <input
                            name="email"
                            type="text"
                            v-model="model.email"
                            class="form-control"
                            :class="{ 'border-danger': errors.email }"
                        >
                        <div v-for="(error, i) in errors.email"
                             :key="`email__error__${i}`"
                             class="text-danger error"
                        >
                            {{ error }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            <strong>{{ $t('admin.order.form.notes') }}</strong>
                        </label>
                        <textarea
                            name="notes"
                            type="text"
                            rows="7"
                            v-model="model.notes"
                            class="form-control"
                            :class="{ 'border-danger': errors.notes }"
                        ></textarea>
                        <div v-for="(error, i) in errors.notes"
                             :key="`notes__error__${i}`"
                             class="text-danger error"
                        >
                            {{ error }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>
                            <strong>{{ $t('admin.order.form.ordered_status') }}</strong>
                        </label>
                        <select class="form-control" name="ordered_status" v-model="model.ordered_status" required :class="{ 'border-danger': errors.ordered_status }">
                            <option v-for="(status, i) in $t('admin.order.order_statuses')" :value="i">{{ status }}</option>
                        </select>
                        <div v-for="(error, i) in errors.ordered_status"
                             :key="`ordered_status_product__error__${i}`"
                             class="text-danger error"
                        >
                            {{ error }}
                        </div>
                    </div>
                    <div class="text-center date-centered">
                        <table class="table table-bordered table-t5px-b10px">
                            <tbody><tr class="w-50percent text-333 small">
                                <th class="p-all-5px">{{ $t('admin.order.form.order_number') }}:</th>
                                <td class="text-666">{{ model.id }}</td>
                            </tr>
                            <tr class="w-50percent text-333 small">
                                <th class="p-all-5px">{{ $t('admin.order.form.created_at') }}:</th>
                                <td class="text-666">{{ normalizeDate(this.model.created_at) }}</td>
                            </tr>
                            <tr class="w-50percent text-333 small">
                                <th class="p-all-5px">{{ $t('admin.order.form.updated_at') }}:</th>
                                <td class="text-666">{{ normalizeDate(this.model.updated_at) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <template v-if="model.id">
                    <button
                        type="submit"
                        class="btn btn-danger"
                        @click.prevent="deleteOrder"
                    >
                        {{ $t('common.word.delete') }}
                    </button>
                </template>
                <button
                    type="submit"
                    class="btn btn-primary"
                    @click.prevent="submit"
                >
                    {{ $t('common.word.save') }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import FormHelper from '../../mixins/form_helper';
    import moment from 'moment';

    export default {
        props: {
            model: {
                type: Object,
                required: true,
            },
            errors: {
                type: Object,
                required: true,
            },
        },

        mixins: [FormHelper],

        methods: {
            submit() {
                this.$emit('submit', this.model);
            },

            deleteOrder() {
                confirmation.delete(() => {
                    this.$emit('delete');
                });
            },

            normalizeDate(date) {
                return moment(date).format("DD.MM.YYYY hh:mm");
            },
        }
    };
</script>
