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
            <a-input-password
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
            />
          </a-form-item>

          <!-- New password -->
          <a-form-item label="New Password" has-feedback>
            <a-input-password
              v-decorator="[
                'new_password',
                {
                  rules: [
                    {
                      required: true,
                      message: 'Mat khau moi la bat buoc!',
                    },
                    {
                      validator: validateToConfirmPassword,
                    },
                  ],
                },
              ]"
            />
          </a-form-item>

          <!-- Confirm password -->
          <a-form-item label="Confirm New Password" has-feedback>
            <a-input-password
              v-decorator="[
                'confirm_new_password',
                {
                  rules: [
                    {
                      required: true,
                      message: 'Vui long nhap xac nhan mat khau moi',
                    },
                    {
                      validator: compareToNewPassword,
                    },
                  ],
                },
              ]"
              @blur="handleConfirmBlur"
            />
          </a-form-item>

          <!-- Button Submit -->
          <a-form-item :wrapper-col="{ span: 16, offset: 8 }">
            <a-button type="primary" html-type="submit" :loading="loading">
              Đổi mật khẩu
            </a-button>
          </a-form-item>
        </a-form>
      </a-col>
    </a-row>
  </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
  layout: 'admin',
  data() {
    return {
      loading: false,
      isTouchedConfirmValue: false,
      form: this.$form.createForm(this, { name: 'coordinated' }),
    }
  },
  methods: {
    ...mapActions({
      actChangePassword: 'auth/actChangePassword'
    }),
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFieldsAndScroll((err, values) => {
        if (!err) {
          this.loading = true;
          this.actChangePassword(values)
            .then(res => {
              this.loading = false;
              if (res.ok) {
                // Thanh cong
                this.$notification.success({
                  message: 'Thanh cong',
                  description: 'Doi mat khau thanh cong',
                });
                this.form.resetFields();
              } else {
                this.$notification.error({
                  message: 'Có lỗi xảy ra',
                  description: res.error,
                });
              }
            })
        }
      });
    },
    handleConfirmBlur(e) {
      const value = e.target.value;
      this.isTouchedConfirmValue = this.isTouchedConfirmValue || !!value;
      // Sự kiện blur mô tả việc người dùng đã nhấn chuột vào ô input
      // -> Sau đó nhấn chuột ra ngoài -> sự kiện blur nó sẽ được kích hoạt
      // Nếu chưa nhập -> isTouchedConfirmValue = false, value = ''
        // -> false || false -> false
      // nếu nhập thông tin rồi : isTouchedConfirmValue = false, value = 'abc'
        //-> false || true -> true
    },
    compareToNewPassword(rule, confirm_new_password, callback) {
      const form = this.form;
      if (confirm_new_password && confirm_new_password !== form.getFieldValue('new_password')) {
        callback('Mật khẩu xác nhận không khớp!');
      } else {
        callback(); // Không có dòng thông báo lỗi
      }
    },
    validateToConfirmPassword(rule, new_password, callback) {
      const form = this.form;
      if (new_password && this.isTouchedConfirmValue) {
        // Nếu người dùng đã nhập vào new password
        // Và cũng đã nhập thông tin vào ô input thứ 3
        form.validateFields(['confirm_new_password'], { force: true }); // Gọi hàm validate dữ liệu cho confirm_new_password
      }
      callback(); // Không có dòng thông báo lỗi
    },
  }
}
</script>

<style>

</style>
