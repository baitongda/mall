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
                billDetail: {
                    accountData: '2015-02-01',
                    payMoney: ' 0.00 = 0.00 (订单金额) - 0.00 (佣金金额) - 0.00 (退单金额) + 0.00 (退还佣金) ' +
                    '- 0.00 (店铺促销费用)',
                    settlementNum: '75 (原结算单号：20150115)',
                    settlementStatus: '已出帐',
                    startData: '2015-01-01  至  2015-01-31',
                },
                loading: false,
                managementSearch: '',
                modal: false,
                payModal: {
                    billInformation: '',
                    billNum: '213624925721571',
                    endDate: '2016-12-22',
                    startDate: '2016-12-22',
                },
                payValidate: {
                    startDate: [
                        {
                            message: '日期不能为空',
                            required: true,
                            trigger: 'blur',
                        },
                    ],
                },
                refundColumns: [
                    {
                        align: 'center',
                        fixed: 'left',
                        key: 'number',
                        title: '退单编号',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'orderNum',
                        title: '订单编号',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'orderMoney',
                        title: '退款金额',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'commission',
                        title: '退还佣金',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'redEnvelopes',
                        title: '退还红包',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'type',
                        title: '类型',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'dealData',
                        title: '退款日期',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'buyer',
                        title: '买家',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'buyerId',
                        title: '买家ID',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'businessmen',
                        title: '商家',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'businessmenId',
                        title: '商家ID',
                        width: 150,
                    },
                ],
                refundData: [
                    {
                        businessmen: 'Rey旗舰店',
                        businessmenId: '235468',
                        buyer: '买家',
                        buyerId: '0012',
                        commission: '37.00',
                        dealData: '2017-2-24',
                        number: '01',
                        orderMoney: '999.00',
                        orderNum: '324235346',
                        redEnvelopes: '0.00',
                        type: '端午节优惠活动',
                    },
                    {
                        businessmen: 'Rey旗舰店',
                        businessmenId: '235468',
                        buyer: '买家',
                        buyerId: '0012',
                        commission: '37.00',
                        dealData: '2017-2-24',
                        number: '01',
                        orderMoney: '999.00',
                        orderNum: '324235346',
                        redEnvelopes: '0.00',
                        type: '端午节优惠活动',
                    },
                    {
                        businessmen: 'Rey旗舰店',
                        businessmenId: '235468',
                        buyer: '买家',
                        buyerId: '0012',
                        commission: '37.00',
                        dealData: '2017-2-24',
                        number: '01',
                        orderMoney: '999.00',
                        orderNum: '324235346',
                        redEnvelopes: '0.00',
                        type: '端午节优惠活动',
                    },
                    {
                        businessmen: 'Rey旗舰店',
                        businessmenId: '235468',
                        buyer: '买家',
                        buyerId: '0012',
                        commission: '37.00',
                        dealData: '2017-2-24',
                        number: '01',
                        orderMoney: '999.00',
                        orderNum: '324235346',
                        redEnvelopes: '0.00',
                        type: '端午节优惠活动',
                    },
                ],
                refundDataList: [
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
                refundSearchData: '',
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
                settlementStatus: 1,
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
                        title: '佣金',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'redEnvelopes',
                        title: '平台红包',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'orderData',
                        title: '下单日期',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'dealData',
                        title: '成交日期',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'buyer',
                        title: '买家',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'buyerId',
                        title: '买家ID',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'businessmen',
                        title: '商家',
                        width: 150,
                    },
                    {
                        align: 'center',
                        key: 'businessmenId',
                        title: '商家ID',
                        width: 150,
                    },
                ],
                typeData: [
                    {
                        buyer: '买家',
                        buyerId: '0012',
                        businessmen: 'Rey旗舰店',
                        businessmenId: '235468',
                        commission: '37.00',
                        dealData: '2017-2-24',
                        freight: '12.00',
                        redEnvelopes: '0.00',
                        number: '01',
                        orderMoney: '999.00',
                        orderData: '2017-2-21',
                    },
                    {
                        buyer: '买家',
                        buyerId: '0012',
                        businessmen: 'Rey旗舰店',
                        businessmenId: '235468',
                        commission: '37.00',
                        dealData: '2017-2-24',
                        freight: '12.00',
                        redEnvelopes: '0.00',
                        number: '01',
                        orderMoney: '999.00',
                        orderData: '2017-2-21',
                    },
                    {
                        buyer: '买家',
                        buyerId: '0012',
                        businessmen: 'Rey旗舰店',
                        businessmenId: '235468',
                        commission: '37.00',
                        dealData: '2017-2-24',
                        freight: '12.00',
                        redEnvelopes: '0.00',
                        number: '01',
                        orderMoney: '999.00',
                        orderData: '2017-2-21',
                    },
                    {
                        buyer: '买家',
                        buyerId: '0012',
                        businessmen: 'Rey旗舰店',
                        businessmenId: '235468',
                        commission: '37.00',
                        dealData: '2017-2-24',
                        freight: '12.00',
                        redEnvelopes: '0.00',
                        number: '01',
                        orderMoney: '999.00',
                        orderData: '2017-2-21',
                    },
                ],
            };
        },
        methods: {
            exportData() {
                this.$refs.orderTable.exportCsv({
                    filename: '订单列表数据',
                });
            },
            exportRefundData() {
                this.$refs.refundTable.exportCsv({
                    filename: '退单列表数据',
                });
            },
            goBack() {
                const self = this;
                self.$router.go(-1);
            },
            pay() {
                this.modal = true;
            },
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.payModal.validate(valid => {
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
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="operation-settlement">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>结算管理—账单明细</span>
            </div>
            <card :bordered="false">
                <i-form ref="billDetail" :model="billDetail" :rules="ruleValidate" :label-width="200">
                    <div class="bill-information">
                        <h5>店铺 - 官方店铺2（ID：15）结算单</h5>
                        <div class="bill-content">
                            <row>
                                <i-col span="18">
                                    <form-item label="结算单号">
                                        {{billDetail.settlementNum}}
                                    </form-item>
                                </i-col>
                            </row>
                            <row>
                                <i-col span="18">
                                    <form-item label="起止日期">
                                        {{billDetail.startData}}
                                    </form-item>
                                </i-col>
                            </row>
                            <row>
                                <i-col span="18">
                                    <form-item label="出账日期">
                                        ￥{{billDetail.accountData}}
                                    </form-item>
                                </i-col>
                            </row>
                            <row>
                                <i-col span="20">
                                    <form-item label="平台应付金额">
                                        {{billDetail.payMoney}}
                                    </form-item>
                                </i-col>
                            </row>
                            <row>
                                <i-col span="18">
                                    <form-item label="结算状态">
                                        {{billDetail.settlementStatus}}
                                    </form-item>
                                </i-col>
                            </row>
                            <row>
                                <i-col span="18">
                                    <form-item label="">
                                        <i-button type="primary" v-if="settlementStatus === 0">审核</i-button>
                                        <i-button type="primary" v-if="settlementStatus === 1"
                                            @click.native="pay">付款完成</i-button>
                                        <i-button type="primary" v-if="settlementStatus === 2">打印</i-button>
                                    </form-item>
                                </i-col>
                            </row>
                        </div>
                    </div>
                </i-form>
                <tabs type="card">
                    <tab-pane label="订单列表">
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
                                 :data="typeData" ref="orderTable"></i-table>
                    </tab-pane>
                    <tab-pane label="退单列表">
                        <div class="album-action">
                            <i-button class="add-data" type="ghost" @click.native="exportRefundData">导出数据</i-button>
                            <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                            <div class="goods-body-header-right">
                                <i-input v-model="managementWord" placeholder="请输入关键词进行搜索">
                                    <i-select v-model="refundSearchData" slot="prepend" style="width: 150px;">
                                        <i-option v-for="item in refundDataList"
                                                  :value="item.value">{{ item.label }}</i-option>
                                    </i-select>
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </i-input>
                            </div>
                        </div>
                        <i-table highlight-row :columns="refundColumns" :context="self"
                                 :data="refundData" ref="refundTable"></i-table>
                    </tab-pane>
                </tabs>
            </card>
            <modal
                    v-model="modal"
                    title="付款信息" class="refund-attribute-modal">
                <div>
                    <i-form ref="payModal" :model="payModal" :rules="payValidate" :label-width="100">
                        <row>
                            <i-col span="18">
                                <form-item label="账单编号" prop="billNum">
                                    {{ payModal.billNum }}
                                </form-item>
                            </i-col>
                        </row>
                        <form-item label="起止日期" prop="startDate">
                            <row>
                                <i-col span="8">
                                    <date-picker type="date" placeholder="选择日期"
                                                 v-model="payModal.startDate"></date-picker>
                                </i-col>
                                <i-col span="2" style="text-align: center">-</i-col>
                                <i-col span="8">
                                    <date-picker type="date" placeholder="选择日期"
                                                 v-model="payModal.endDate"></date-picker>
                                </i-col>
                            </row>
                        </form-item>
                        <row>
                            <i-col span="20">
                                <form-item label="出账信息" prop="">
                                    <i-input type="textarea" v-model="payModal.billInformation"></i-input>
                                    <p class="tip">
                                        请输入汇款单号、支付方式等付款凭证
                                    </p>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="20" class="submit-modal">
                                <form-item>
                                    <i-button :loading="loading" type="primary" @click.native="submit">
                                        <span v-if="!loading">确认提交</span>
                                        <span v-else>正在提交…</span>
                                    </i-button>
                                </form-item>
                            </i-col>
                        </row>
                    </i-form>
                </div>
            </modal>
        </div>
    </div>
</template>