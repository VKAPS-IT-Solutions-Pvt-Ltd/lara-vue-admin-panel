<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Todo</div>
                       <div v-for="error in errors " :key="error">{{error}}</div>
                    <div class="card-body">
                      <div class="input-group">
                        
                        <input type="text" placeholder="todo.." class="form-control" v-model="todo_input">
                   
                      <div class="input-group-append">
                        <button type="button" class="btn btn-info" v-if='!edit_todo_id' @click="saveTodo()">Add</button>
                        <button type="button" class="btn btn-info" v-else @click="updateTodo()">Update</button>
                      </div>
                     </div>
                       <button type="button" class="btn btn-sm text=danger float-right" @click="resetTodo(--index)">reset</button>
                     <table class="table table-bordered mt-4">
                        <thead>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>action</th>
                        </thead>
                        <tbody>
                            <tr v-for="(todo,index) in todos " :key="index">
                                <td>{{++index}}</td>
                                <td>{{todo.name}}</td>
                                <td>
                                    <button class="btn btn-sm btn-danger" @click="deleteTodo(--index)">Delete</button>
                                    <button class="btn btn-sm btn-primary" @click="editTodo(--index)">edit</button>
                                </td>
                            </tr>
                        </tbody>
                     </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
        return{
            todos:[],
            api:'http://127.0.0.1:8000/api/todos',
            todo_input:'',
            errors:'',
            edit_todo_id:'',
            edit_index:''
        }
        },
        methods:{
         saveTodo(){
            if(this.todo_input.length > 0){
                let data = {'name': this.todo_input};
                this.axios.post(this.api,data).then(res=>{
                this.todos.push (res.data);
                this.todo_input = '';
            });
               }
            else{
             this.errors = "Invalid data";
            }
         },
         deleteTodo(index){
            if(this.todos[index].id){
                alert('are you want to delete??');
                this.axios.delete(this.api+'/'+this.todos[index].id).then(res=>{
                    alert(res.data);
                    this.todos.splice(index,1);
                });
            }

         },
          editTodo(index){
            if(this.todos[index].id){
                
                this.todo_input = this.todos[index].name;
                this.edit_todo_id = this.todos[index].id;
                this.edit_index = index;

            }

         },
          resetTodo(){
              this.todo_input = '';
                this.edit_todo_id = '';
                this.edit_index = '';    
                  },

          updateTodo(){
             if(this.todo_input.length > 0){
                let data = {'name': this.todo_input};
                this.axios.put(this.api+'/'+this.todos[this.edit_index].id,data).then(res=>{
             this.todos[this.edit_index].name = res.data.name;
             alert("updated successfully");
             this.todo_input= '';
            });
               }
            else{
             this.errors = "Invalid data";
            }
         }
        },
        
        mounted() {
            this.axios.get(this.api).then(res=>{
                this.todos = res.data;
            });
        }
    }
</script>
