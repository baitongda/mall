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
                returnDetail: {
                    applyTime: '2016-12-21  10:31:59',
                    goodsname: '****',
                    handelResult: '同意',
                    handelText: 'jahwuiha',
                    handelTime: '2016-12-21  10:31:59',
                    linePay: '99.00',
                    orderCounts: '99.00',
                    payStyle: '在线支付',
                    refundDescription: 'mm',
                    refundImg: '',
                    refundMoney: '99.00',
                    refundReason: '不要',
                    remarks: '',
                },
                ruleValidate: {
                    remarks: [
                        {
                            message: '信息不能为空',
                            required: true,
                            trigger: 'blur',
                        },
                    ],
                },
            };
        },
        methods: {
            goBack() {
                const self = this;
                self.$router.go(-1);
            },
            handleSubmit(name) {
                this.$refs[name].validate(valid => {
                    if (valid) {
                        this.$Message.success('提交成功!');
                    } else {
                        this.$Message.error('表单验证失败!');
                    }
                });
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="order-rejected-look">
            <div class="store-refund-process">
                <div class="edit-link-title">
                    <i-button type="text" @click.native="goBack">
                        <icon type="chevron-left"></icon>
                    </i-button>
                    <span>所有记录—查看</span>
                </div>
                <div class="refund-process-content store-information">
                    <card :bordered="false">
                        <i-form ref="returnDetail" :model="returnDetail" :rules="ruleValidate" :label-width="200">
                            <div class="refund-application">
                                <h5>买家退货退款申请</h5>
                                <div class="application-content refund-module">
                                    <row>
                                        <i-col span="18">
                                            <form-item label="申请时间">
                                                {{returnDetail.applyTime}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="商品名称">
                                                {{returnDetail.goodsname}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="退款金额">
                                                ￥{{returnDetail.refundMoney}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="退货原因">
                                                {{returnDetail.refundReason}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="退货说明">
                                                {{returnDetail.refundDescription}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="凭证上传">
                                                {{returnDetail.refundImg}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                            <div class="refund-handel">
                                <h5>商家退款退货处理</h5>
                                <div class="handel-content refund-module">
                                    <row>
                                        <i-col span="18">
                                            <form-item label="审核结果">
                                                {{returnDetail.handelResult}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="处理备注">
                                                {{returnDetail.handelText}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="处理时间">
                                                {{returnDetail.handelTime}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                            <div class="order-information">
                                <h5>订单退款审核</h5>
                                <div class="order-pay-content refund-module">
                                    <row>
                                        <i-col span="18">
                                            <form-item label="平台确认">
                                                {{returnDetail.payStyle}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="处理备注">
                                                {{returnDetail.orderCounts}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="处理时间">
                                                {{returnDetail.linePay}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                            <div class="refund-review">
                                <h5>退款详细</h5>
                                <div class="review-content refund-module">
                                    <row>
                                        <i-col span="18">
                                            <form-item label="支付方式">
                                                {{returnDetail.orderCounts}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="在线退款金额">
                                                ￥{{returnDetail.linePay}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                        </i-form>
                    </card>
                </div>
            </div>
        </div>
    </div>
</template>