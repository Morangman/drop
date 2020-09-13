<template>
    <order-form
        :model.sync="model"
        :errors.sync="errors"
        @submit="store"
    >
    </order-form>
</template>

<script>
    import OrderFormComponent from './form';
    import FormHelper from '../../mixins/form_helper';

    export default {
        components: {
            OrderForm: OrderFormComponent,
        },

        mixins: [FormHelper],

        data() {
            return {
                model: {
                    name: null,
                    email: null,
                    phone: null,
                    notes: null,
                    ordered_status: null,
                },
                errors: {},
                formData: null,
            };
        },

        methods: {
            store(data) {
                this.errors = {};
                this.formData = new FormData();
                this.collectFormData(data);

                axios.post(
                    Router.route('admin.order.store'),
                    this.formData,
                ).then(() => {
                    location.href = Router.route('admin.order.index');
                }).catch(({ response: { data: { errors } } }) => {
                    this.errors = errors;
                    this.scrollToError();
                });
            },
        },
    };
</script>
