// FormComponent.vue

<template>
    <div class="col-md-6">
        <form @submit.prevent="saveTweet">
            <div class="form-group">
                <textarea
                        class="form-control"
                        cols="12"
                        maxlength="130"
                        v-model="body"
                        required>
                </textarea>
            </div>
            <div class="form-group pull-right">
                <button class="btn btn-primary">
                    Tweet
                </button>
            </div>
        </form>
    </div>
</template>
<script>
    import Event from '../event.js';
    export default {
        data() {
            return {
                body: '',
                postData: {}
            }
        },
        methods: {
            saveTweet() {
                axios.post('/tweet/save', {body: this.body}).then(res => {
                    this.postData = res.data;
                    Event.$emit('added_tweet', this.postData);
                }).catch(e => {
                    console.log(e);
                });
                this.body = '';
            }
        }
    }
</script>