<template>
  <div>
    <a-row :gutter="30">
      <a-col :span="12">
        <a-form
          :form="form"
          :label-col="{ span: 8 }"
          :wrapper-col="{ span: 16 }"
          @submit="handleSubmit"
        >
          <!-- Email -->
          <a-form-item label="Email">
            <a-input
              v-decorator="['email', {
                initialValue: currentUser.email
              }]"
              v-bind:disabled="true"
            />
          </a-form-item>

          <!-- Username -->
          <a-form-item label="Username">
            <a-input
              v-decorator="['user_name', {
                  initialValue: currentUser.user_name
              }]"
              v-bind:disabled="true"
            />
          </a-form-item>

          <a-form-item label="Nickname">
            <a-input
              v-decorator="['nickname', {
                  rules: [
                    { required: true, message: 'Nickname bắt buộc phải nhập!' }
                  ],
                  initialValue: currentUser.nickname
              }]"
            />
          </a-form-item>

          <a-form-item label="Họ và tên">
            <a-input
              v-decorator="['fullname', {
                  rules: [
                    { required: true, message: 'Fullname bắt buộc phải nhập!' }
                  ],
                  initialValue: fullname
              }]"
            />
          </a-form-item>

          <a-form-item label="Giới thiệu bản thân">
            <a-textarea
              v-decorator="['description', {
                initialValue: currentUser.description
              }]"
              v-bind:auto-size="{ minRows: 5 }"
            />
          </a-form-item>

          <!-- Button Submit -->
          <a-form-item :wrapper-col="{ span: 16, offset: 8 }">
            <a-button type="primary" html-type="submit">
              Cập nhật thông tin
            </a-button>
          </a-form-item>
        </a-form>
      </a-col>
      <a-col :span="12">
        col-12
      </a-col>
    </a-row>
  </div>
</template>

<script>
import { mapState } from 'vuex';
export default {
  layout: 'admin',
  data() {
    return {
      formLayout: 'horizontal',
      form: this.$form.createForm(this, { name: 'coordinated' }),
    };
  },
  computed: {
    ...mapState({
      currentUser: state => state.auth.currentUser
    }),
    fullname() {
      return   this.currentUser.last_name + ' ' + this.currentUser.first_name
    },
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFields((err, values) => {
        if (!err) {
          console.log('Received values of form: ', values);
        }
      });
    }
  },
}
</script>

<style>

</style>
