<template>
    <div class="setting-form">
        <b-card no-body>
            <b-tabs card>
                <b-tab :title="$t('admin.setting.form.contacts.title')" active>
                    <div class="row">
                    <div class="col-md-6">
                        <label>
                            <h4>{{ $t('admin.setting.form.contacts.title') }}</h4>
                        </label>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>
                                        <strong>{{ $t('admin.setting.form.contacts.email') }}</strong>
                                    </label>
                                    <input
                                        name="email"
                                        type="text"
                                        v-model="model.general_settings.email"
                                        class="form-control"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>
                                        <strong>{{ $t('admin.setting.form.contacts.contact_email') }}</strong>
                                    </label>
                                    <input
                                        name="contact_email"
                                        type="text"
                                        v-model="model.general_settings.contact_email"
                                        class="form-control"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>
                                        <strong>{{ $t('admin.setting.form.contacts.phone') }}</strong>
                                    </label>
                                    <input
                                        name="phone"
                                        type="text"
                                        v-model="model.general_settings.phone"
                                        class="form-control"
                                    >
                                </div><br/>
                                <h4>Ссылки</h4><br/>
                                <div class="form-group">
                                    <label>
                                        <strong>Менеджер</strong>
                                    </label>
                                    <input
                                        name="phone"
                                        type="text"
                                        v-model="model.general_settings.manager"
                                        class="form-control"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>
                                        <strong>Телеграм канал</strong>
                                    </label>
                                    <input
                                        name="phone"
                                        type="text"
                                        v-model="model.general_settings.tg"
                                        class="form-control"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>
                                        <strong>Google docs</strong>
                                    </label>
                                    <input
                                        name="google_docs"
                                        type="text"
                                        v-model="model.general_settings.gd"
                                        class="form-control"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>
                            <h4>{{ $t('admin.setting.form.seo.title') }}</h4>
                        </label>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>
                                        <strong>{{ $t('admin.setting.form.seo.seo_title') }}</strong>
                                    </label>
                                    <input
                                        name="seo-title"
                                        type="text"
                                        v-model="model.general_settings.seo_title"
                                        class="form-control"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>
                                        <strong>{{ $t('admin.setting.form.seo.seo_meta') }}</strong>
                                    </label>
                                    <input
                                        name="seo-meta"
                                        type="text"
                                        v-model="model.general_settings.seo_meta"
                                        class="form-control"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>
                                        <strong>{{ $t('admin.setting.form.seo.seo_keywords') }}</strong>
                                    </label>
                                    <input
                                        name="seo-keywords"
                                        type="text"
                                        v-model="model.general_settings.seo_keywords"
                                        class="form-control"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>
                                        <strong>{{ $t('admin.setting.form.seo.seo_image') }}</strong>
                                    </label>
                                    <b-form-file
                                        class="mt-1"
                                        accept=".png,.jpg,.jpeg,.gif"
                                        @change="showSeoPreviewImage($event)"
                                    ></b-form-file>
                                    <img width="auto"
                                         height="100"
                                         class="center-image"
                                         v-if="seoPreviewImage"
                                         :src="seoPreviewImage"
                                         v-on:click="deleteSeoImage"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </b-tab>
                <b-tab :title="$t('admin.setting.form.code_insert.title')">
                    <label>
                        <h4>{{ $t('admin.setting.form.code_insert.title') }}</h4>
                    </label>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <editor
                                    v-model="model.code_insert"
                                    lang="javascript"
                                    theme="chrome"
                                    width="auto"
                                    height="500"
                                    class="form-control"
                                ></editor>
                            </div>
                        </div>
                    </div>
                </b-tab>
                <b-tab :title="$t('admin.setting.form.modify.title')">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group" v-for="(content, i) in model.content" :key="`content__${i}`">
                                <h4>{{ content.title }}</h4>
                                <input
                                    name="site-title"
                                    type="text"
                                    v-model="model.content[i].value"
                                    class="form-control"
                                >
                            </div>
                        </div>
                    </div>
                </b-tab>
                <b-tab title="Prom.ua прайс">
                    <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <span v-for="(file, index) in files">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="files">
                                            <p>{{ file.title }}</p>
                                            <a :href="file.url">{{ file.url }}</a>
                                            <span class="input-group-btn">
                                                <button v-on:click="deleteFile(file.id)" class="btn btn-default" type="button">{{ $t('common.word.delete') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <span v-for="(file, index) in model.files">
                            <div class="card">
                                <div class="card-body">
                                    <div class="input-group">
                                        <input type="text" v-model="file.title" class="form-control">
                                        <b-form-file
                                            class="form-control"
                                            accept=".xls,.xlsx"
                                            @change="addFileEvent($event, index)"
                                        ></b-form-file>
                                        <span class="input-group-btn">
                                            <button v-on:click="removeFile(index)" class="btn btn-default" type="button">{{ $t('common.word.delete') }}</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </span>
                            <div class="card-body">
                                <button v-on:click="addFile" class="btn btn-info">{{ $t('common.word.add') }}</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </b-tab>
            </b-tabs>
        </b-card>
        <div v-for="(error, i) in errors.general_settings"
             :key="`general_settings__error__${i}`"
             class="text-danger error"
        >
            {{ error }}
        </div>
        <div v-for="(error, i) in errors.code_insert"
             :key="`code_insert__error__${i}`"
             class="text-danger error"
        >
            {{ error }}
        </div>
        <div class="text-right">
            <template v-if="!settings.id">
                <button
                    type="submit"
                    class="btn btn-primary"
                    @click.prevent="save"
                >
                    {{ $t('common.word.save') }}
                </button>
            </template>
            <template v-if="settings.id">
            <button
                type="submit"
                class="btn btn-primary"
                @click.prevent="update"
            >
                {{ $t('common.word.update') }}
            </button>
            </template>
        </div>
    </div>
</template>

<script>
    import FormHelper from "../../mixins/form_helper";

    export default {
        mixins: [FormHelper],

        components: {
            editor: require('vue2-ace-editor'),
        },

        props: {
            settings: {
                type: Object,
                required: false,
            },
            content: {
                type: Object,
                required: false,
            },
            files: {
                type: Array,
                required: false,
            },
        },

        data() {
            return {
                errors: {},
                formData: null,
                seoPreviewImage: null,
                model: {
                    general_settings: {
                        email: null,
                        contact_email: null,
                        manager: null,
                        tg: null,
                        gd: null,
                        phone: null,
                        seo_title: null,
                        seo_meta: null,
                        seo_keywords: null,
                        seo_image: null,
                    },
                    content: {},
                    files: [],
                    code_insert: null,
                },
            };
        },

        methods: {
            showSeoPreviewImage(event) {
                const file = event.target.files[0];

                this.model.general_settings.seo_image = file;

                this.seoPreviewImage = URL.createObjectURL(file);

                this.$forceUpdate();
            },

            deleteSeoImage() {
                this.model.general_settings.seo_image = null;
                this.seoPreviewImage = null;

                notify.success(
                    this.$t('admin.setting.messages.seo_image_delete')
                );
            },

            deleteFile(media) {
                confirmation.delete(() => {
                    axios.delete(
                        Router.route('admin.setting.media.delete', {media: media}),
                    ).then((response) => {
                        location.href = Router.route('admin.setting.index');
                    }).catch(({response: {data: {errors}}}) => {
                        this.errors = errors;
                    });
                });
            },

            addFileEvent(event, index) {
                const file = event.target.files[0];

                this.model.files[index].file = file;
            },

            addFile() {
                this.model.files.push({
                    title: null,
                    file: null,
                });

                this.$forceUpdate();
            },

            removeFile(index) {
                this.model.files.splice(index, 1);

                this.$forceUpdate();
            },

            save() {
                this.errors = {};
                this.formData = new FormData();
                this.collectFormData(this.model);

                axios.post(
                    Router.route('admin.setting.store'),
                    this.formData,
                ).then(() => {
                    location.href = Router.route('admin.setting.index');
                }).catch(({ response: { data: { errors } } }) => {
                    this.errors = errors;
                    this.scrollToError();
                });
            },

            update() {
                this.errors = {};
                this.formData = new FormData();
                this.formData.set('_method', 'PATCH');
                this.collectFormData(this.model);

                axios.post(
                    Router.route('admin.setting.update', { setting: this.model.id }),
                    this.formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                        },
                    },
                ).then(() => {
                    location.href = Router.route('admin.setting.index');
                }).catch(({ response: { data: { errors } } }) => {
                    this.errors = errors;
                    this.scrollToError();
                });
            },
        },

        created() {
            if (this.settings.id) {
                this.model = this.settings;

                this.model.content = this.content;

                this.seoPreviewImage = this.model.general_settings.seo_image;

                this.model.general_settings.seo_image = null;

                this.model.files = [];
            }
        },
    };
</script>
