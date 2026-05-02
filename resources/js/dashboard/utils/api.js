import axios from "axios";
import { showToast } from "../../helpers/toast";
import { validation } from "./validation";

const api = {
    async request({
        method = "get",
        url,
        data = {},
        successMsg = null,
        container = document,
    }) {
        try {
            const res = await axios({ method, url, data });

            if (res.data?.status) {
                showToast({
                    type: "success",
                    title: "Success",
                    text: successMsg || res.data.message,
                });
            } else {
                throw new Error(res.data?.message || "Request failed");
            }

            return res.data;
        } catch (err) {
            const response = err.response;

            if (response?.status === 422 && response.data.errors) {
                validation.handle(response.data.errors, container);

                // showToast({
                //     type: "error",
                //     title: "Validation Error",
                //     text: "Please fix the highlighted fields",
                // });

                throw err;
            }

            showToast({
                type: "error",
                title: "Error",
                text: response?.data?.message || "Something went wrong",
            });

            throw err;
        }
    },
};

export default api;
