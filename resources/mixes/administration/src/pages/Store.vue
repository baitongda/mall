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
                applicationColumns: [
                    {
                        align: 'center',
                        fixed: 'left',
                        type: 'selection',
                        width: 60,
                    },
                    {
                        align: 'center',
                        key: 'memberID',
                        title: '会员ID',
                        width: 190,
                    },
                    {
                        align: 'center',
                        key: 'memberAccount',
                        title: '会员账号',
                        width: 170,
                    },
                    {
                        align: 'center',
                        key: 'applicationStatus',
                        title: '申请状态',
                        width: 170,
                    },
                    {
                        align: 'center',
                        key: 'shopLength',
                        title: '开店时长',
                        width: 170,
                    },
                    {
                        align: 'center',
                        key: 'contactName',
                        title: '联系人姓名',
                        width: 120,
                    },
                    {
                        align: 'center',
                        key: 'contactPhone',
                        title: '联系人电话',
                        width: 120,
                    },
                    {
                        align: 'center',
                        key: 'contactEmail',
                        title: '联系邮箱',
                        width: 120,
                    },
                    {
                        align: 'center',
                        key: 'companyName',
                        title: '公司名称',
                        width: 170,
                    },
                    {
                        align: 'center',
                        key: 'companyAddress',
                        title: '公司地址',
                        width: 170,
                    },
                    {
                        align: 'left',
                        key: 'companyPhone',
                        title: '公司电话',
                        width: 170,
                    },
                    {
                        align: 'center',
                        fixed: 'right',
                        key: 'action',
                        render() {
                            return '<i-button size="small" type="ghost">查看</i-button>';
                        },
                        title: '操作',
                        width: 90,
                    },
                ],
                applicationData: [
                    {
                        applicationStatus: '等待审核',
                        companyAddress: '陕西西安',
                        companyName: '本初网络',
                        companyPhone: '029-5554544',
                        contactEmail: '105454354@qq.com',
                        contactName: '王',
                        contactPhone: '15434354534',
                        memberAccount: '465465445',
                        memberID: '65454654546',
                        shopLength: '3年',
                    },
                    {
                        applicationStatus: '等待审核',
                        companyAddress: '陕西西安',
                        companyName: '本初网络',
                        companyPhone: '029-5554544',
                        contactEmail: '105454354@qq.com',
                        contactName: '王',
                        contactPhone: '15434354534',
                        memberAccount: '465465445',
                        memberID: '65454654546',
                        shopLength: '3年',
                    },
                    {
                        applicationStatus: '等待审核',
                        companyAddress: '陕西西安',
                        companyName: '本初网络',
                        companyPhone: '029-5554544',
                        contactEmail: '105454354@qq.com',
                        contactName: '王',
                        contactPhone: '15434354534',
                        memberAccount: '465465445',
                        memberID: '65454654546',
                        shopLength: '3年',
                    },
                    {
                        applicationStatus: '等待审核',
                        companyAddress: '陕西西安',
                        companyName: '本初网络',
                        companyPhone: '029-5554544',
                        contactEmail: '105454354@qq.com',
                        contactName: '王',
                        contactPhone: '15434354534',
                        memberAccount: '465465445',
                        memberID: '65454654546',
                        shopLength: '3年',
                    },
                ],
                applicationSearch: '',
                applicationWord: '',
                managementColumns: [
                    {
                        align: 'center',
                        fixed: 'left',
                        type: 'selection',
                        width: 60,
                    },
                    {
                        align: 'center',
                        key: 'shopID',
                        title: '店铺ID',
                        width: 190,
                    },
                    {
                        align: 'center',
                        key: 'shopName',
                        title: '店铺名称',
                        width: 170,
                    },
                    {
                        align: 'center',
                        key: 'ownerId',
                        title: '店主账号',
                        width: 170,
                    },
                    {
                        align: 'center',
                        key: 'businessNumber',
                        title: '商家账号',
                        width: 170,
                    },
                    {
                        align: 'center',
                        key: 'shopImg',
                        render() {
                            return '<icon type="image"></icon>';
                        },
                        title: '店铺头像',
                        width: 100,
                    },
                    {
                        align: 'center',
                        key: 'shopLogo',
                        render() {
                            return '<icon type="image"></icon>';
                        },
                        title: '店铺LOGO',
                        width: 100,
                    },
                    {
                        align: 'center',
                        key: 'shopLevel',
                        title: '店铺等级',
                        width: 170,
                    },
                    {
                        align: 'center',
                        key: 'shopTime',
                        title: '开店时间',
                        width: 170,
                    },
                    {
                        align: 'left',
                        key: 'endTime',
                        title: '到期时间',
                        width: 170,
                    },
                    {
                        align: 'center',
                        fixed: 'right',
                        key: 'action',
                        render(row, column, index) {
                            return `<i-button class="first-btn" @click.native="remove(${index})"
                                    type="ghost" size="small">删除</i-button>
                                    <i-button @click.native="toEdit" type="ghost" size="small">编辑</i-button>`;
                        },
                        title: '操作',
                        width: 180,
                    },
                ],
                managementData: [
                    {
                        businessNumber: '爱拍数码',
                        endTime: '2017-12-5',
                        ownerId: '545464554',
                        shopID: '65454654546',
                        shopImg: '541',
                        shopLevel: '钻石店铺',
                        shopLogo: '454',
                        shopName: '默认',
                        shopTime: '2017-12-5',
                    },
                    {
                        businessNumber: '爱拍数码',
                        endTime: '2017-12-5',
                        ownerId: '545464554',
                        shopID: '65454654546',
                        shopImg: '541',
                        shopLevel: '钻石店铺',
                        shopLogo: '454',
                        shopName: '默认',
                        shopTime: '2017-12-5',
                    },
                    {
                        businessNumber: '爱拍数码',
                        endTime: '2017-12-5',
                        ownerId: '545464554',
                        shopID: '65454654546',
                        shopImg: '541',
                        shopLevel: '钻石店铺',
                        shopLogo: '454',
                        shopName: '默认',
                        shopTime: '2017-12-5',
                    },
                    {
                        businessNumber: '爱拍数码',
                        endTime: '2017-12-5',
                        ownerId: '545464554',
                        shopID: '65454654546',
                        shopImg: '541',
                        shopLevel: '钻石店铺',
                        shopLogo: '454',
                        shopName: '默认',
                        shopTime: '2017-12-5',
                    },
                ],
                managementWord: '',
                managementSearch: '',
                searchList: [
                    {
                        label: '店铺名称',
                        value: '店铺名称',
                    },
                    {
                        label: '商品名称',
                        value: '商品名称',
                    },
                    {
                        label: '商品分类',
                        value: '商品分类',
                    },
                ],
                self: this,
            };
        },
        methods: {
            exportData() {
                this.$refs.managementTable.exportCsv({
                    filename: '店铺管理数据',
                });
            },
            remove(index) {
                this.managementData.splice(index, 1);
            },
            toEdit() {
                const self = this;
                self.$router.push({
                    path: 'store/edit',
                });
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="store">
            <tabs value="name1">
                <tab-pane label="店铺管理" name="name1">
                    <card :bordered="false">
                        <div class="prompt-box">
                            <p>提示</p>
                            <p>如果当前时间超过店铺有效期或店铺处于关闭状态，前台将不能继续浏览该店铺，
                                但是店主仍然可以编辑该店铺</p>
                        </div>
                        <div class="store-body">
                            <div class="store-body-header">
                                <i-button class="export-btn" @click="exportData" type="ghost">导出数据</i-button>
                                <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                                <div class="store-body-header-right">
                                    <i-input v-model="managementWord" placeholder="请输入关键词进行搜索">
                                        <i-select v-model="managementSearch" slot="prepend" style="width: 100px;">
                                            <i-option v-for="item in searchList"
                                                      :value="item.value">{{ item.label }}</i-option>
                                        </i-select>
                                        <i-button slot="append" type="primary">搜索</i-button>
                                    </i-input>
                                </div>
                            </div>
                            <i-table ref="managementTable" highlight-row class="shop-table"
                                     :columns="managementColumns" :context="self" :data="managementData"></i-table>
                        </div>
                        <div class="page">
                            <page :total="100" show-elevator></page>
                        </div>
                    </card>
                </tab-pane>
                <tab-pane label="开店申请" name="name2">
                    <card :bordered="false">
                        <div class="prompt-box">
                            <p>提示</p>
                            <p>如果当前时间超过店铺有效期或店铺处于关闭状态，前台将不能继续浏览该店铺，
                                但是店主仍然可以编辑该店铺</p>
                        </div>
                        <div class="store-body">
                            <div class="store-body-header">
                                <div class="store-body-header-right">
                                    <i-input v-model="applicationWord" placeholder="请输入关键词进行搜索">
                                        <i-select v-model="applicationSearch" slot="prepend" style="width: 100px;">
                                            <i-option :key="item"
                                                      :value="item.value"
                                                      v-for="item in searchList">
                                                {{ item.label }}</i-option>
                                        </i-select>
                                        <i-button slot="append" type="primary">搜索</i-button>
                                    </i-input>
                                </div>
                            </div>
                            <i-table highlight-row class="shop-table"
                                     :columns="applicationColumns"
                                     :context="self"
                                     :data="applicationData"
                                     ref="applicationTable" >
                            </i-table>
                        </div>
                        <div class="page">
                            <page :total="100" show-elevator></page>
                        </div>
                    </card>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>