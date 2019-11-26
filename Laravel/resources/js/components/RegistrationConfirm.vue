<template>
            <div class="float-left mb-4">
                <form enctype="multipart/form-data" action="" method="post" id="registration" ref="form">
                    <input type="hidden" name="_token" :value="csrf">
                    <button type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#RegistrationModalLong">
                        登録
                    </button>
                    <!-- モーダルの設定 -->
                    <div class="modal fade" id="RegistrationModalLong" tabindex="-1" role="dialog" aria-labelledby="RegistrationModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="RegistrationModalLongTitle">商品情報の登録</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    商品情報を登録しますか?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                    <button type="button" class="btn btn-primary" v-on:click="RegistrationConfirm">登録</button>
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
        RegistrationConfirm: function() {
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