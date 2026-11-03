<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use IPv4\SubnetCalculator;

class SubnetCalculatorController extends Controller
{
    /**
     * Show the subnet calculator form.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('frontend.subnet.form'); 
    }

    /**
     * Process the subnet calculator form and return the result on the same form page.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function calculateSubnet(Request $request)
    {
      
        $request->validate([
            'ip_address' => 'required|ip',
            'subnet_mask' => 'required|integer|min:1|max:32',
        ]);

    
        $subnetCalculator = new SubnetCalculator($request->input('ip_address'), $request->input('subnet_mask'));

 
        $networkPortion = $subnetCalculator->getNetworkPortion();
        $ipAddressWithNetworkSize = $subnetCalculator->getIpAddressWithNetworkSize();
        $subnetMask = $subnetCalculator->getSubnetMask();
        $networkSize = $subnetCalculator->getNetworkSize();
        $numberOfIPAddresses = $subnetCalculator->getNumberOfIPAddresses();
        $numberOfAddressableHosts = $subnetCalculator->getNumberOfAddressableHosts();
        $broadcastAddress = $subnetCalculator->getBroadcastAddress();
        $hostAddressRange = $subnetCalculator->getMinHost() . ' - ' . $subnetCalculator->getMaxHost();

     
        return view('frontend.subnet.form', compact(
            'networkPortion', 
            'ipAddressWithNetworkSize', 
            'subnetMask', 
            'networkSize', 
            'numberOfIPAddresses', 
            'numberOfAddressableHosts', 
            'broadcastAddress', 
            'hostAddressRange'
        ));
    }
}
