<?php

/**
 * @copyright 2018 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @author 2018 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OC\Authentication\TwoFactorAuth;

use OCP\Authentication\TwoFactorAuth\IProvider;

/**
 * Contains all two-factor provider information for the two-factor login challenge
 */
class ProviderSet {

	/** @var IProvider */
	private $providers;

	/** @var bool */
	private $providerMissing;

	/**
	 * @param IProvider[] $providers
	 * @param bool $providerMissing
	 */
	public function __construct(array $providers, bool $providerMissing) {
		$this->providers = [];
		foreach ($providers as $provider) {
			$this->providers[$provider->getId()] = $provider;
		}
		$this->providerMissing = $providerMissing;
	}

	/**
	 * @param string $providerId
	 * @return IProvider|null
	 */
	public function getProvider(string $providerId) {
		return $this->providers[$providerId] ?? null;
	}

	/**
	 * @return IProvider[]
	 */
	public function getProviders(): array {
		return $this->providers;
	}

	public function isProviderMissing(): bool {
		return $this->providerMissing;
	}

}
