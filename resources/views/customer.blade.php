@extends('app')

@section('title', 'Customers')
@section('page-title', 'Customers')

@section('content')

<div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
    <table class="w-full border-collapse">
        <thead>
            <tr class="border-b border-gray-200">
                <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wide">Customer ID</th>
                <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wide">Customer Name</th>
                <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wide">Email</th>
                <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wide">Address</th>
                <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wide">Status</th>
                <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-400 uppercase tracking-wide">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
            <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50 transition-colors">
                <td class="px-5 py-4 text-sm text-gray-800">{{ $customer->customer_id }}</td>
                <td class="px-5 py-4 text-sm text-gray-800">{{ $customer->name }}</td>
                <td class="px-5 py-4 text-sm text-gray-600">{{ $customer->email ?? '-' }}</td>
                <td class="px-5 py-4 text-sm text-gray-600">{{ $customer->address ?? '-' }}</td>
                <td class="px-5 py-4">
                    @if($customer->status)
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">Active</span>
                    @else
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-600">Inactive</span>
                    @endif
                </td>

                @include('function', [
                    'resource' => 'customers',
                    'id'       => $customer->id,
                    'actions'  => [
                        ['icon' => 'bx-key',      'label' => 'Active',     'action' => 'activate'],
                        ['icon' => 'bx-power-off', 'label' => 'Deactivate', 'action' => 'deactivate'],
                        ['icon' => 'bx-edit-alt', 'label' => 'Edit',       'action' => 'edit'],
                        ['icon' => 'bx-trash',    'label' => 'Delete',     'action' => 'delete', 'danger' => true],
                    ],
                ])
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-5 py-16 text-center text-sm text-gray-400">
                    Belum ada data customer.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
