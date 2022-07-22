<template>
    <div>
        <h4 class="text-center">Todas as Inscrições</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="EditInscricao">
                     <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="inscricao.name">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" v-model="inscricao.email">
                    </div>
                     <div class="form-group">
                        <label>CPF</label>
                        <input type="text" class="form-control" v-model="inscricao.cpf">
                    </div>
                     <div class="form-group">
                        <label>Endereço</label>
                        <input type="text" class="form-control" v-model="inscricao.address">
                    </div>
                     <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" class="form-control" v-model="inscricao.telephone">
                    </div>
                     <div class="form-group">
                        <label>Celular</label>
                        <input type="text" class="form-control" v-model="inscricao.cel">
                    </div>
                    <div class="form-group">
                        <label>Tipos de Usuários</label>
                        <input type="text" class="form-control" v-model="inscricao.type_user">
                    </div>
                    <div class="form-group">
                        <label>Cursos</label>
                        <input type="text" class="form-control" v-model="inscricao.course">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="text" class="form-control" v-model="inscricao.password">
                    </div>
                    <button type="submit" class="btn btn-primary">Editar Curso</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            inscricao: {}
        }
    },
    methods: {
          updateInscricao() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/inscricao/add', this.inscricao)
                    .then(response => {
                        this.$router.push({name: 'inscricao'})
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
