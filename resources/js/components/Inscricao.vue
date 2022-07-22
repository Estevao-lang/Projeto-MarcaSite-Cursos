<template>
    <div>
        <h4 class="text-center">Todas as Inscrições</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Cpf</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Tipo de Usuário</th>
                <th>Curso</th>
                <th>Senha</th>


            </tr>
            </thead>
            <tbody>
            <tr v-for="incricao in incricao" :key="incricao.id">
                <td>{{ incricao.id }}</td>
                <td>{{ incricao.name }}</td>
                <td>{{ incricao.email }}</td>
                <td>{{ incricao.cpf }}</td>
                <td>{{ incricao.address }}</td>
                <td>{{ incricao.telephone }}</td>
                <td>{{ incricao.cel }}</td>
                <td>{{ incricao.type_user }}</td>
                <td>{{ incricao.course }}</td>
                <td>{{ incricao.password }}</td>


                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'EditInscricao', params: { id: incricao.id }}" class="btn btn-primary">Editar
                        </router-link>
                        <button class="btn btn-danger" @click="deleteInscricao(incricao.id)">Deletar</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/incricao/add')">Adicionar Inscrição </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            incricao: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/incricao')
                .then(response => {
                    this.cursos = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteInscricao(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/incricao/delete/${id}`)
                    .then(response => {
                        let i = this.incricao.map(item => item.id).indexOf(id); // find index of your object
                        this.incricao.splice(i, 1)
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>