<template>
            <div class="float-left mb-4 ml-3">
                <form action="/product-list" method="get" ref="form">
                    <button type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#ReturnModal">
                        戻る
                    </button>
                    <!-- モーダルの設定 -->
                    <div class="modal fade" id="ReturnModal" tabindex="-1" role="dialog" aria-labelledby="ReturnModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ReturnModalLongTitle">商品情報一覧に戻る</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    入力内容は保存されません。前画面に戻りますか?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                    <button type="button" class="btn btn-primary" v-on:click="ReturnConfirm">戻る</button>
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
        ReturnConfirm: function() {
            this.$refs.form.submit()
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>