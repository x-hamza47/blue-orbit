export const showToast = ({
    title = "Title",
    text = "Default message",
    type = "success",
    timer = 2500,
}) => {
    Swal.fire({
        toast: true,
        position: "top-end",
        icon: type,
        text,
        title,
        showConfirmButton: false,
        timer,
        timerProgressBar: true,
        customClass: {
            popup: "rounded-2xl",
        },
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
};
