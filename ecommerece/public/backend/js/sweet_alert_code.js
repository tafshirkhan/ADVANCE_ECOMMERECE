//For cancel the order
$(function () {
    $(document).on("click", "#cancel", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to retrive this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, cancel it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Deleted!", "Order has been deleted.", "success");
            }
        });
    });
});

////For Confirmed Order
$(function () {
    $(document).on("click", "#confirm", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure to confirm this order?",
            text: "The order will be start processing once you confirm it!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, confirm it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Confirm!", "Order has been confirmed", "success");
            }
        });
    });
});

////For Confirmed Order To Processing Order
$(function () {
    $(document).on("click", "#processing", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure to process this order?",
            text: "The order will be start processing soon!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, process it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Confirm!", "Order has been process", "success");
            }
        });
    });
});

////For Processing Order to Picked order
$(function () {
    $(document).on("click", "#picked", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "The order will be ready for shipped!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, picked it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Confirm!", "Order has been picked", "success");
            }
        });
    });
});

////For Picked order to Shipped Order
$(function () {
    $(document).on("click", "#shipped", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "The order will be shipped!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, ship it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Confirm!", "Order has been shipped", "success");
            }
        });
    });
});

////For Shipped Order to Delivered order
$(function () {
    $(document).on("click", "#delivered", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "The order will be delivered!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, deliver it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Confirm!", "Order has been delivered", "success");
            }
        });
    });
});
