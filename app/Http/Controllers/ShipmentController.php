<?php

namespace App\Http\Controllers;

use App\Http\Requests\Shipment\CreateShipmentRequest;
use App\Http\Requests\Shipment\UpdateShipmentRequest;
use App\Models\Shipment;

class ShipmentController extends Controller
{
    public function index(int $vendorId)
    {
        $shipments = Shipment::where('vendor_id', $vendorId)->get();

        return $shipments;
    }

    public function show(int $shipmentId)
    {
        $shipment = Shipment::find($shipmentId);

        if (!$shipment) {
            return response()->json(['message' => 'Shipment not found'], 404);
        }

        return $shipment;
    }

    public function store(CreateShipmentRequest $request, int $vendorID)
    {
        $params = $request->validated();

        $params['vendor_id'] = $vendorID;

        $shipment = Shipment::create($params);

        return $shipment;
    }

    public function update(UpdateShipmentRequest $request, int $shipmentId)
    {
        $shipment = Shipment::find($shipmentId);

        if (!$shipment) {
            return response()->json(['message' => 'Shipment not found'], 404);
        }

        $shipment->update($request->validated());

        return $shipment;
    }
}
