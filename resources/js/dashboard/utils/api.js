import axios from "axios";
import { showToast } from "../../helpers/toast";

const api = {
    async request({ method = "get", url, data = {}, successMsg = null }) {
        try {
            const res = await axios({ method, url, data });

            if (res.data?.status) {
                    showToast({
                        type: "success",
                        title: "Success",
                        text: successMsg || res.data.message,
                    });
            } else {
                throw res;
            }

            return res.data;
        } catch (err) {
            const response = err.response;

            if (response?.status === 422 && response.data.errors) {
                this.handleValidation(response.data.errors);

                showToast({
                    type: "error",
                    title: "Validation Error",
                    text: "Please fix the highlighted fields",
                });

                throw response.data.errors;
            }

            showToast({
                type: "error",
                title: "Error",
                text: response?.data?.message || "Something went wrong",
            });

            throw err;
        }
    },

    handleValidation(errors) {
        document.querySelectorAll('[id^="error-"]').forEach((el) => {
            el.innerText = "";
            el.classList.add("hidden");
        });

        Object.keys(errors).forEach((key) => {
            const el = document.getElementById(`error-${key}`);
            if (el) {
                el.innerText = errors[key][0];
                el.classList.remove("hidden");
            }
        });
    },
};

export default api;
