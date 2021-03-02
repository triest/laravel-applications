<template>
  <div class="card">
    <div class="card-body">
      <flash-message class="myCustomClass"></flash-message>
      <h2 class="card-title">Письма</h2>
      <div class="form-group">
        <label for="exampleInputEmail1">Имя:</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="Введите имя" v-model="name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Телефон:</label>
        <input type="email" class="form-control" id="exampleInputSubject"
               placeholder="Введите телефон" v-model="phone">
      </div>
      <div class="form-group">
        <label class="form-check-label" for="letter_text">Обращение:</label>
        <textarea class="form-control" id="letter_text" name="letter_text" v-model="description"
                  placeholder="Введите обращение" rows="20"
                  cols="20" required></textarea>
        <br>
        <button :disabled='disableSendButton' id="sendButton" name="sendButton" class="btn btn-primary"
                v-on:click="sendEmail()">Отправить
        </button>
      </div>
    </div>

  </div>
</template>

<script>
export default {

  name: "Application",
  data() {
    return {
      name: '',
      phone: '',
      description: '',
      disableSendButton: false
    }
  },
  methods: {
    sendEmail() {

      this.disableSendButton = true;
      axios.post('api/application', {
        name: this.name,
        phone: this.phone,
        description: this.description
      })
          .then(response => {
            this.flashSuccess("Заявка отправленна")
            this.name = "";
            this.phone = "";
            this.description = "";
            this.disableSendButton = false;
          })
          .catch(err => {
            this.disableSendButton = false;
            let message = "";
            if (err.response.status === 422) {
              message = Object.values(err.response.data.errors).join('<br>')
            }
            if (err.response.status === 500) {
              message += "Ошибка. Обратитесь к администратору";
            }
            this.flashError(message,{
              timeout: 15000});
          })
    }
  }
}
</script>

<style scoped>

</style>
