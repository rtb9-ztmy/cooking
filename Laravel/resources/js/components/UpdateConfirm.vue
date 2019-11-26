<template>
            <div class="float-left mb-4">
                <form enctype="multipart/form-data" action="" method="post" id="update" ref="form">
                    <input type="hidden" name="_token" :value="csrf">
                    <button type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#UpdateModalLong">
                        更新
                    </button>
                    <!-- モーダルの設定 -->
                    <div class="modal fade" id="UpdateModalLong" tabindex="-1" role="dialog" aria-labelledby="UpdateModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">商品情報の更新</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    商品情報を更新しますか?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                    <button type="button" class="btn btn-primary" v-on:click="UpdateConfirm">更新</button>
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
        UpdateConfirm: function() {
            this.$refs.form.submit()
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