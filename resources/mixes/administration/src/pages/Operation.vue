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
                btnStatus: true,
                managementSearch: '',
                searchList: [
                    {
                        label: '店铺名称',
                        value: '订单编号',
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
                typeColumns: [
                    {
                        align: 'center',
                        fixed: 'left',
                        key: 'number',
                        title: '账单编号',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'orderMoney',
                        title: '订单金额（含运费）',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'freight',
                        title: '运费',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'commission',
                        title: '收取佣金',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'refund',
                        title: '退单金额',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'shopCosts',
                        title: '店铺费用',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'distribution',
                        title: '分销佣金',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'settlement',
                        title: '本期应结',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'accountData',
                        title: '出账日期',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'status',
                        title: '帐单状态',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'businessName',
                        title: '商家名称',
                        width: 150,
                    },
                    {
                        align: 'center',
                        fixed: 'right',
                        key: 'action',
                        render(row, column, index) {
                            return `<i-button class="delete-ad" @click.native="handel(${index})"
                                    type="ghost" v-if="btnStatus === true">处理</i-button>
                                    <i-button class="delete-ad" @click.native="look(${index})"
                                    type="ghost" v-if="btnStatus === false">查看</i-button>`;
                        },
                        title: '操作',
                        width: 150,
                    },
                ],
                typeData: [
                    {
                        accountData: '2017-5-9',
                        businessName: 'Rey旗舰店',
                        commission: '37.00',
                        distribution: '10.00',
                        freight: '12.00',
                        refund: '0.00',
                        number: '01',
                        orderMoney: '999.00',
                        settlement: '865.00',
                        shopCosts: '30.00',
                        status: '已出账',
                    },
                    {
                        accountData: '2017-5-9',
                        businessName: 'Rey旗舰店',
                        commission: '37.00',
                        distribution: '10.00',
                        freight: '12.00',
                        refund: '0.00',
                        number: '01',
                        orderMoney: '999.00',
                        settlement: '865.00',
                        shopCosts: '30.00',
                        status: '已出账',
                    },
                    {
                        accountData: '2017-5-9',
                        businessName: 'Rey旗舰店',
                        commission: '37.00',
                        distribution: '10.00',
                        freight: '12.00',
                        refund: '0.00',
                        number: '01',
                        orderMoney: '999.00',
                        settlement: '865.00',
                        shopCosts: '30.00',
                        status: '已出账',
                    },
                    {
                        accountData: '2017-5-9',
                        businessName: 'Rey旗舰店',
                        commission: '37.00',
                        distribution: '10.00',
                        freight: '12.00',
                        refund: '0.00',
                        number: '01',
                        orderMoney: '999.00',
                        settlement: '865.00',
                        shopCosts: '30.00',
                        status: '已出账',
                    },
                ],
            };
        },
        methods: {
            exportData() {
                this.$refs.managementTable.exportCsv({
                    filename: '结算管理数据',
                });
            },
            handel() {
                const self = this;
                self.$router.push({
                    path: 'operation/settlement',
                });
            },
            look() {

            },
            remove(index) {
                this.typeData.splice(index, 1);
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="operation">
            <tabs value="name1">
                <tab-pane label="结算管理" name="name1">
                    <card :bordered="false">
                        <div class="prompt-box">
                            <p>提示</p>
                            <p>账单计算公式：订单金额（含运费）-佣金金额-退单金额+退还金额-店铺促销费用+订金订单中的未退定金+
                                下单时使用的平台红包-全部退款时应扣除的平台红包-分销佣金</p>
                            <p>账单处理流程为：系统出账>商家确认>平台审核>财务支付（完成结算）4个环节，其中平台审核和财务支付
                                需要平台介入，请予以关注</p>
                        </div>
                        <div class="album-action">
                            <i-button class="add-data" type="ghost" @click.native="exportData">导出数据</i-button>
                            <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                            <div class="goods-body-header-right">
                                <i-input v-model="managementWord" placeholder="请输入关键词进行搜索">
                                    <i-select v-model="managementSearch" slot="prepend" style="width: 150px;">
                                        <i-option v-for="item in searchList"
                                                  :value="item.value">{{ item.label }}</i-option>
                                    </i-select>
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </i-input>
                            </div>
                        </div>
                        <i-table highlight-row :columns="typeColumns" :context="self"
                                 :data="typeData" ref="managementTable"></i-table>
                        <div class="page">
                            <page :total="150" show-elevator></page>
                        </div>
                    </card>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>