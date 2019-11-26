<template>
            <div class="float-left mb-4 ml-3">
                <form enctype="multipart/form-data" action="/product-delete" method="post" ref="form">
                    <input type="hidden" name="_token" :value="csrf">
                    <input type="hidden" name="ProductID" v-bind:value="product.ProductID">
                    <button type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#DeleteModalLong">
                        削除
                    </button>
                    <!-- モーダルの設定 -->
                    <div class="modal fade" id="DeleteModalLong" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="DeleteModalLongTitle">商品情報の削除</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    商品情報を削除しますか?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                    <button type="button" class="btn btn-primary" v-on:click="DeleteConfirm">削除</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
</template>

<script>
export default {
    methods: {
        DeleteConfirm: function() {
            this.$refs.form.submit()
        }
    },
    props: {
        product: {
            type: Object,
            required: true,
        }
    },
    data: () => ({
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }),
    mounted() {
        console.log('Component mounted.')
    }
}
</script>