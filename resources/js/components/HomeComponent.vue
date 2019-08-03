<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcoming</div>

                    <div class="card-body">
                        Hi {{initialusername.name}}. <br>
                        Welcome {{getName()}} to the new blog. <br>
                        {{isAdmin()}}<br>
                        We are designing a new dashboard with much better experience at <a href="/admin">here! </a>. 
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['initialusername'],
        mounted() {
            console.log(`Hi ${this.initialusername.name}. Welcome back!`)
        },

        data: function(){
            return {
                // As object and array are passed by REFERENCE in Js, the proper way to pass props to data by either shallow or deep copy (clone) https://stackoverflow.com/questions/40408096/whats-the-correct-way-to-pass-props-as-initial-data-in-vue-js-2
                //Shalow copy https://github.com/vuejs/vue/issues/158 or https://laracasts.com/discuss/channels/vue/vuejs-saving-data or Lodash
                // name: Vue.util.extend({},this.initialusername),
                name: _.cloneDeep(this.initialusername),
            }

        },
        methods: {
            getName: function(){
                return this.name.name;
            },

            isAdmin: function(){
                return this.name.is_admin ? "You can manage the blog.": "You can only edit your profile!";
            }
        }

        
    }
</script>
