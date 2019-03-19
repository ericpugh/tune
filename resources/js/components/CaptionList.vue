<template>
    <div class="captions-list mt-2 text-left">
        <div v-if="loading" class="loading">
            Loading...
        </div>
        <div v-else class="card">
            <div class="card-header">Captions</div>
            <div class="card-body">
                <ul class="list-group">
                    <li v-for="caption in captions" :key="caption.id">
                        <a :href="'/embed/' + caption.id" target="_blank" class="text-muted">{{ caption.name }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                loading: false,
                captions: null
            }
        },
        created () {
            this.getCaptions();
        },
        methods: {
            async getCaptions() {
                this.loading = true;
                this.captions = null;
                await axios.get('/api/captions')
                    .then((response) => {
                        this.loading = false;
                        this.captions = response.data;
                    })
            }
        }
    }
</script>

<style scoped lang="scss">
    .captions-list {
        .card {
            border: none;
            .card-header {
                background-color: transparent;
            }
            ul.list-group {
                list-style: none;
            }
        }
    }
</style>