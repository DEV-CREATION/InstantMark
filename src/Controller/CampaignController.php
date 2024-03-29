<?php

namespace App\Controller;

use App\Entity\Campaign;
use App\Form\CampaignBannersType;
use App\Form\CampaignType;
use App\Repository\BannerRepository;
use App\Repository\CampaignRepository;
use App\Service\RegieApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/campaign')]
class CampaignController extends AbstractController
{
    #[Route('/', name: 'app_campaign_index', methods: ['GET'])]
    public function index(CampaignRepository $campaignRepository): Response
    {
        return $this->render('campaign/index.html.twig', [
            'campaigns' => $campaignRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_campaign_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CampaignRepository $campaignRepository): Response
    {
        $campaign = new Campaign();
        $form = $this->createForm(CampaignType::class, $campaign);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $campaignRepository->save($campaign, true);

            return $this->redirectToRoute('app_campaign_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('campaign/new.html.twig', [
            'campaign' => $campaign,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_campaign_show', methods: ['GET'])]
    public function show(Campaign $campaign): Response
    {
        return $this->render('campaign/show.html.twig', [
            'campaign' => $campaign,
        ]);
    }

    #[Route('/{id}/add-banner', name: 'app_campaign_add_banner', methods: ['GET', 'POST'])]
    public function addBanner(Request $request, Campaign $campaign, BannerRepository $bannerRepository, CampaignRepository $campaignRepository): Response
    {
        $form = $this->createForm(CampaignBannersType::class, $campaign, [
            'banners' => $bannerRepository->findAll(),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $campaignRepository->save($campaign, true);

            return $this->redirectToRoute('app_campaign_banners_index', ['id' => $campaign->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('campaign/banners/add.html.twig', [
            'campaign' => $campaign,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/banners', name: 'app_campaign_banners_index', methods: ['GET'])]
    public function bannersIndex(Campaign $campaign): Response
    {
        return $this->render('campaign/banners/index.html.twig', [
            'campaign' => $campaign,
        ]);
    }

    #[Route('/{id}/validat', name: 'app_campaign_validate', methods: ['GET'])]
    public function validate(Campaign $campaign, RegieApi $regieApi): Response
    {
        if ($regieApi->createCampaign($campaign)) {
            $this->addFlash('success', 'La campagne a été validée avec succès.');
        } else {
            $this->addFlash('error', 'Une erreur est survenue lors de la validation de la campagne.');
        }

        return $this->redirectToRoute('app_campaign_show', ['id' => $campaign->getId()], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/refresh', name: 'app_campaign_refresh', methods: ['GET'])]
    public function refresh(Campaign $campaign, RegieApi $regieApi): Response
    {
        if ($regieApi->loadCampaign($campaign)) {
            $this->addFlash('success', 'La campagne a été actualisée avec succès.');
        } else {
            $this->addFlash('error', 'Une erreur est survenue lors de l\'actualisation de la campagne.');
        }

        return $this->redirectToRoute('app_campaign_show', ['id' => $campaign->getId()], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/edit', name: 'app_campaign_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Campaign $campaign, CampaignRepository $campaignRepository): Response
    {
        $form = $this->createForm(CampaignType::class, $campaign);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $campaignRepository->save($campaign, true);

            return $this->redirectToRoute('app_campaign_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('campaign/edit.html.twig', [
            'campaign' => $campaign,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_campaign_delete', methods: ['POST'])]
    public function delete(Request $request, Campaign $campaign, CampaignRepository $campaignRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$campaign->getId(), $request->request->get('_token'))) {
            $campaignRepository->remove($campaign, true);
        }

        return $this->redirectToRoute('app_campaign_index', [], Response::HTTP_SEE_OTHER);
    }
}
