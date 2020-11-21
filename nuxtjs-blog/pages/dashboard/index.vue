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
                initialValue: 'test Email'
              }]"
              v-bind:disabled="true"
            />
          </a-form-item>

          <!-- Username -->
          <a-form-item label="Username">
            <a-input
              v-decorator="['user_name', {
                  initialValue: 'test Username'
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
                  initialValue: 'test nickname'
              }]"
            />
          </a-form-item>

          <a-form-item label="Họ và tên">
            <a-input
              v-decorator="['fullname', {
                  rules: [
                    { required: true, message: 'Fullname bắt buộc phải nhập!' }
                  ],
                  initialValue: 'test fullname'
              }]"
            />
          </a-form-item>

          <a-form-item label="Giới thiệu bản thân">
            <a-textarea
              v-decorator="['description', {
                initialValue: 'test description'
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
export default {
  layout: 'admin',
  data() {
    return {
      formLayout: 'horizontal',
      form: this.$form.createForm(this, { name: 'coordinated' }),
    };
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFields((err, values) => {
        if (!err) {
          console.log('Received values of form: ', values);
        }
      });
    },
    handleSelectChange(value) {
      console.log(value);
      this.form.setFieldsValue({
        note: `Hi, ${value === 'male' ? 'man' : 'lady'}!`,
      });
    },
  },
}
</script>

<style>

</style>
