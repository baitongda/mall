<script>
    import injection from '../helpers/injection';

    export default {
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
        data() {
            return {
                action: `${window.api}/mall/admin/upload`,
                addData: {
                    brandName: '',
                    disabledGroup: '图片',
                    initials: '',
                    logo: '',
                    selectStyle: '母婴用品',
                    sort: '',
                    switch1: true,
                },
                defaultList: [],
                loading: false,
                ruleValidate: {
                    brandName: [
                        {
                            message: '名称不能为空',
                            required: true,
                            trigger: 'blur',
                        },
                    ],
                },
                self: this,
                styleData: [
                    {
                        children: [
                            {
                                value: '童车童床',
                                label: '童车童床',
                                children: [
                                    {
                                        label: '婴儿推车',
                                        value: '婴儿推车',
                                    },
                                    {
                                        label: '自行车',
                                        value: '自行车',
                                    },
                                    {
                                        label: '婴儿推车',
                                        value: '婴儿推车',
                                    },
                                    {
                                        label: '电动车',
                                        value: '电动车',
                                    },
                                    {
                                        label: '安全座椅',
                                        value: '安全座椅',
                                    },
                                ],
                            },
                            {
                                label: '营养辅食',
                                value: '营养辅食',
                            },
                            {
                                label: '尿裤湿巾',
                                value: '尿裤湿巾',
                            },
                        ],
                        label: '个护化妆',
                        value: '个护化妆',
                    },
                    {
                        children: [
                            {
                                children: [
                                    {
                                        label: '婴儿推车1',
                                        value: '婴儿推车1',
                                    },
                                    {
                                        label: '自行车2',
                                        value: '自行车2',
                                    },
                                    {
                                        label: '婴儿推车3',
                                        value: '婴儿推车3',
                                    },
                                    {
                                        label: '电动车',
                                        value: '电动车',
                                    },
                                    {
                                        label: '安全座椅4',
                                        value: '安全座椅4',
                                    },
                                ],
                                label: '服饰寝居',
                                value: '服饰寝居',
                            },
                            {
                                children: [
                                    {
                                        label: '婴儿推车1',
                                        value: '婴儿推车1',
                                    },
                                    {
                                        label: '自行车2',
                                        value: '自行车2',
                                    },
                                ],
                                label: '营养辅食',
                                value: '营养辅食',
                            },
                            {
                                children: [
                                    {
                                        label: '车1',
                                        value: '车1',
                                    },
                                    {
                                        label: '自行车2',
                                        value: '自行车2',
                                    },
                                ],
                                label: '尿裤湿巾',
                                value: '尿裤湿巾',
                            },
                        ],
                        label: '家用电器',
                        value: '家用电器',
                    },
                ],
            };
        },
        methods: {
            goBack() {
                const self = this;
                self.$router.go(-1);
            },
            handleChange(value, selectedData) {
                this.style = true;
                this.addData.selectStyle = selectedData.map(o => o.label).join('>');
            },
            removeLogo() {
                this.addData.logo = '';
            },
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.addData.validate(valid => {
                    if (valid) {
                        window.console.log(valid);
                    } else {
                        self.loading = false;
                        self.$notice.error({
                            title: '请正确填写设置信息！',
                        });
                    }
                });
            },
            uploadBefore() {
                injection.loading.start();
            },
            uploadError(error, data) {
                const self = this;
                injection.loading.error();
                if (typeof data.message === 'object') {
                    for (const p in data.message) {
                        self.$notice.error({
                            title: data.message[p],
                        });
                    }
                } else {
                    self.$notice.error({
                        title: data.message,
                    });
                }
            },
            uploadFormatError(file) {
                this.$notice.warning({
                    title: '文件格式不正确',
                    desc: `文件 ${file.name} 格式不正确`,
                });
            },
            uploadSuccess(data) {
                const self = this;
                injection.loading.finish();
                self.$notice.open({
                    title: data.message,
                });
                self.addData.logo = data.data.path;
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="goods-brand-edit">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>品牌管理—编辑</span>
            </div>
            <card :bordered="false">
                <i-form ref="addData" :model="addData" :rules="ruleValidate" :label-width="200">
                    <div>
                        <row>
                            <i-col span="12">
                                <form-item label="品牌名称" prop="brandName">
                                    <i-input v-model="addData.brandName"></i-input>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="名称首字母">
                                    <i-select placeholder="请选择" v-model="addData.initials">
                                        <i-option v-for="item in initials" :value="item.value"
                                                  :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="20">
                                <form-item label="所属分类">
                                    <div class="flex-module">
                                        {{ addData.selectStyle }}
                                        <cascader :data="styleData" trigger="hover" @on-change="handleChange"
                                                  v-model="addData.selectStyle"></cascader>
                                    </div>
                                    <p class="tip">
                                        请选择分类，可关联大分类或更具体的下级分类
                                    </p>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="20">
                                <form-item label="品牌LOGO" prop="logo">
                                    <div class="image-preview" v-if="addData.logo">
                                        <img :src="addData.logo">
                                        <icon type="close" @click.native="removeLogo"></icon>
                                    </div>
                                    <upload :action="action"
                                            :before-upload="uploadBefore"
                                            :format="['jpg','jpeg','png']"
                                            :headers="{
                                                Authorization: `Bearer ${$store.state.token.access_token}`
                                            }"
                                            :max-size="2048"
                                            :on-error="uploadError"
                                            :on-format-error="uploadFormatError"
                                            :on-success="uploadSuccess"
                                            ref="upload"
                                            :show-upload-list="false"
                                            v-if="addData.logo === '' || addData.logo === null">
                                    </upload>
                                    <p class="tip">品牌LOGO尺寸要求宽度为150像素，高度为50像素，比例为3:1的图片；
                                        支持格式gif、jpg、png</p>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="20">
                                <form-item label="展示方式">
                                    <radio-group v-model="addData.disabledGroup">
                                        <radio label="图片"></radio>
                                        <radio label="文字"></radio>
                                    </radio-group>
                                    <p class="tip">在"全部品牌"页面的展示方式，如果设置为"图片"则显示该品牌的"品牌图片标识"，
                                        如果设置为"文字"则显示该品牌的“品牌名”</p>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="20">
                                <form-item label="是否推荐">
                                    <i-switch size="large" v-model="addData.switch1">
                                        <span slot="open">开启</span>
                                        <span slot="close">关闭</span>
                                    </i-switch>
                                    <p class="tip">选择被推荐的图片将在所有品牌列表页"推荐品牌"位置展现</p>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="排序" prop="sort">
                                    <i-input v-model="addData.sort"></i-input>
                                    <p class="tip">
                                        数字范围为0~255，数字越小越靠前
                                    </p>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item>
                                    <i-button :loading="loading" type="primary" @click.native="submit">
                                        <span v-if="!loading">确认提交</span>
                                        <span v-else>正在提交…</span>
                                    </i-button>
                                </form-item>
                            </i-col>
                        </row>
                    </div>
                </i-form>
            </card>
        </div>
    </div>
</template>