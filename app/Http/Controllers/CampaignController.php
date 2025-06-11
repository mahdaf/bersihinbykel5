namespace App\Http\Controllers;

use App\Models\Campaign;

class CampaignController extends Controller
{
    public function show($id)
    {
        $campaign = Campaign::with('akun')->findOrFail($id);
        return view('detailcampaignvol', compact('campaign'));
    }
}
