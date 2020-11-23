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
          <!-- Old Password -->
          <a-form-item label="Password" has-feedback>
            <a-input
              v-decorator="[
                'password',
                {
                  rules: [
                    {
                      required: true,
                      message: 'Mat khau cu bat buoc phai nhap!',
                    }
                  ],
                },
              ]"
              type="password"
            />
          </a-form-item>

          <!-- New password -->
          <a-form-item label="New Password" has-feedback>
            <a-input
              v-decorator="[
                'new_password',
                {
                  rules: [
                    {
                      required: true,
                      message: 'Mat khau moi la bat buoc!',
                    },
                    {
                      validator: validateToNextPassword,
                    },
                  ],
                },
              ]"
              type="password"
            />
          </a-form-item>

          <!-- Confirm password -->
          <a-form-item label="Confirm New Password" has-feedback>
            <a-input
              v-decorator="[
                'confirm_new_password',
                {
                  rules: [
                    {
                      required: true,
                      message: 'Vui long nhap xac nhan mat khau moi',
                    },
                    {
                      validator: compareToFirstPassword,
                    },
                  ],
                },
              ]"
              type="password"
              @blur="handleConfirmBlur"
            />
          </a-form-item>
        </a-form>
      </a-col>
    </a-row>
  </div>
</template>

<script>
export default {
  layout: 'admin',
  data() {
    return {
      confirmDirty: false,
      form: this.$form.createForm(this, { name: 'coordinated' }),
    }
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
    },
    handleConfirmBlur(e) {
      const value = e.target.value;
      this.confirmDirty = this.confirmDirty || !!value;
      // Sự kiện blur mô tả việc người dùng đã nhấn chuột vào ô input
      // -> Sau đó nhấn chuột ra ngoài -> sự kiện blur nó sẽ được kích hoạt
      // Nếu chưa nhập -> confirmDirty = false, value = ''
        // -> false || false -> false
      // nếu nhập thông tin rồi : confirmDirty = false, value = 'abc'
        //-> false || true -> true
    },
    compareToFirstPassword(rule, value, callback) {
      const form = this.form;
      if (value && value !== form.getFieldValue('password')) {
        callback('Two passwords that you enter is inconsistent!');
      } else {
        callback();
      }
    },
    validateToNextPassword(rule, value, callback) {
      const form = this.form;
      if (value && this.confirmDirty) {
        form.validateFields(['confirm'], { force: true });
      }
      callback();
    },
  }
}
</script>

<style>

</style>
