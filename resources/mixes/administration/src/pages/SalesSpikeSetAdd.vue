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
                checkAll: false,
                checkAllGroup: [],
                checkSpikeGroup: [],
                indeterminate: true,
                loading: false,
                searchCategory: '',
                searchLists: [
                    {
                        label: '北京',
                        value: '北京',
                    },
                    {
                        label: '上海',
                        value: '上海',
                    },
                    {
                        label: '西安',
                        value: '西安',
                    },
                ],
                searchProduct: '',
                searchProducts: [
                    {
                        label: '苹果',
                        value: '苹果',
                    },
                    {
                        label: '香蕉',
                        value: '香蕉',
                    },
                ],
                selectList: [
                    'iphone8 plus星空蓝全新发布 信用卡12期分期免息',
                    'iphone8 plus星空蓝全新发布 信用',
                    'iphone8 plus星空蓝全新发布 信用卡12期',
                    'iphone8 plus星空'],
                spikeList: [
                    'iphone8 plus星空蓝全新发布 信用卡12期分期',
                    'iphone8 plus星空蓝全新发布 信',
                    'iphone8 plus星空蓝全新发布 信用卡12',
                    'iphone8 plus星空全新发'],
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
            checkAllGroupChange(data) {
                if (data.length === this.selectList.length) {
                    this.indeterminate = false;
                    this.checkAll = true;
                } else if (data.length > 0) {
                    this.indeterminate = true;
                    this.checkAll = false;
                } else {
                    this.indeterminate = false;
                    this.checkAll = false;
                }
            },
            checkSpikeGroupChange(data) {
                if (data.length === this.spikeList.length) {
                    this.indeterminate = false;
                    this.checkAll = true;
                } else if (data.length > 0) {
                    this.indeterminate = true;
                    this.checkAll = false;
                } else {
                    this.indeterminate = false;
                    this.checkAll = false;
                }
            },
            deleteSpikeGoods() {
//                console.log(this.checkSpikeGroup.length);
//                console.log(this.checkSpikeGroup);
//                if (this.checkSpikeGroup.length > 0) {
//                }
            },
            goBack() {
                const self = this;
                self.$router.go(-1);
            },
            handleCheckAll() {
                if (this.indeterminate) {
                    this.checkAll = false;
                } else {
                    this.checkAll = !this.checkAll;
                }
                this.indeterminate = false;

                if (this.checkAll) {
                    this.checkAllGroup = this.selectList;
                } else {
                    this.checkAllGroup = [];
                }
            },
            handleCheckAllSpike() {
                if (this.indeterminate) {
                    this.checkAll = false;
                } else {
                    this.checkAll = !this.checkAll;
                }
                this.indeterminate = false;

                if (this.checkAll) {
                    this.checkSpikeGroup = this.spikeList;
                } else {
                    this.checkSpikeGroup = [];
                }
            },
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.activityValidate.validate(valid => {
                    if (valid) {
                        self.$Message.success('提交成功!');
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
        <div class="sales-activity-set-add activity-title">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>秒杀活动—设置商品—添加商品</span>
            </div>
            <card class="store storeBox" :bordered="false">
                <div class="prompt-box">
                    <p>提示</p>
                    <p>搜索完商品后请在下方添加商品数量、限购、价格。如未填写则默认为0</p>
                    <p>可批量添加商品（仅相同数量、限购、价格）</p>
                </div>
                <!--搜索模块-->
                <div class="sales-body">
                    <div class="sales-body-header">
                        <row>
                            <i-col span="5">
                                <div class="p-change">
                                    <i-select v-model="searchCategory" placeholder="请选择分类">
                                        <i-option v-for="item in searchLists"
                                                  :value="item.value"
                                                  :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                </div>
                            </i-col>
                            <i-col span="3">
                                <div class="p-change">
                                    <i-select v-model="searchProduct" placeholder="请选择品牌">
                                        <i-option v-for="item in searchProducts"
                                                  :value="item.value"
                                                  :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                </div>
                            </i-col>
                            <i-col span="3">
                                <div class="p-change">
                                    <i-input placeholder="商品关键词"></i-input>
                                </div>
                            </i-col>
                            <i-col span="1">
                                <div class="p-change">
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </div>
                            </i-col>
                            <i-col span="12">
                            </i-col>
                        </row>
                    </div>
                </div>
                <!--可选商品模块-->
                <div class="sales-list-add">
                    <row>
                        <i-col span="11" class="sales-list">
                            <div>
                                <p>可选商品</p>
                                <div class="my-card">
                                    <card :bordered="false">
                                        <checkbox-group v-model="checkAllGroup" @on-change="checkAllGroupChange">
                                            <checkbox :label="item" v-for="item in selectList"></checkbox>
                                        </checkbox-group>
                                    </card>
                                </div>
                                <!--全选模块-->
                                <div class="all-select">
                                    <row>
                                        <i-col span="4">
                                            <div class="p-list">
                                                <i-button @click.prevent.native="handleCheckAll"
                                                          :indeterminate="indeterminate"
                                                          :value="checkAll"
                                                          type="ghost">全选</i-button>
                                            </div>
                                        </i-col>
                                        <i-col span="6">
                                            <div class="p-list">
                                                数量: <i-input style="width:64px"></i-input> 件
                                            </div>
                                        </i-col>
                                        <i-col span="6">
                                            <div class="p-list">
                                                限购: <i-input style="width:64px"></i-input> 件
                                            </div>
                                        </i-col>
                                        <i-col span="8">
                                            <div class="p-list">
                                                价格: <i-input style="width:64px"></i-input> 元
                                            </div>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                        </i-col>
                        <i-col span="3" class="sales-list btn-sales-span">
                            <div>
                                <i-button slot="append" type="primary" class="my-btn">添加至秒杀列表
                                    <icon type="chevron-right"></icon>
                                </i-button>
                            </div>
                        </i-col>
                        <i-col span="10" class="sales-list">
                            <div>
                                <p>参与秒杀商品</p>
                                <div class="my-card">
                                    <card :bordered="false">
                                        <checkbox-group v-model="checkSpikeGroup" @on-change="checkSpikeGroupChange">
                                            <checkbox :label="item" v-for="item in spikeList"></checkbox>
                                        </checkbox-group>
                                    </card>
                                </div>
                                <div class="all-select">
                                    <row>
                                        <i-col span="4">
                                            <div class="p-list">
                                                <i-button :indeterminate="indeterminate"
                                                          :value="checkAll" @click.prevent.native="handleCheckAllSpike"
                                                          type="ghost" style="width:64px" >全选</i-button>
                                            </div>
                                        </i-col>
                                        <i-col span="4">
                                            <div class="p-list remove">
                                                <i-button @click.native="deleteSpikeGoods" type="ghost"
                                                          style="width: 64px">移除</i-button>
                                            </div>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                        </i-col>
                    </row>
                </div>
                <div class="submit-btn">
                    <i-button @click.native="submit" type="primary" class="my-submit">
                        <span v-if="!loading">确认提交</span>
                        <span v-else>正在提交…</span>
                    </i-button>
                </div>
            </card>
        </div>
    </div>
</template>