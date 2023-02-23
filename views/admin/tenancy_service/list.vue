
<template>
    <table-render :path_param="['realestate', 'tenancy_service']" :table_fields="table_fields">
        <template #header>
            <th-render>User</th-render>
            <th-render>Payment</th-render>
            <th-render>Amount</th-render>
            <th-render>Completed</th-render>
            <th-render>Successful</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.user_id__users__name }} {{ item.user_id__users__username }} {{ item.user_id__users__username }}</td>
            <td>{{ item.payment_id }}</td>
            <td>{{ item.amount }}</td>
            <td>{{ item.completed }}</td>
            <td>{{ item.successful }}</td>
        </template>

    </table-render>
</template>

<script>

export default {
    data() {
        return {
            table_fields: [
                'user_id__users__name', 'user_id__users__username', 'user_id__users__email',
                'payment_id', 'amount', 'completed', 'successful'
            ],
        };
    }
};
</script>
